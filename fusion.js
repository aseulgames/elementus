document.addEventListener('DOMContentLoaded', function() {
    const stateIcons = {
        gas: 'images/gas.png',
        liquid: 'images/liquid.png',
        solid: 'images/solid.png',
        water: 'images/liquid.png',
        aceticAcid: 'images/acid.png',
        carbonDioxide: 'images/gas-gas.png',
        salt: 'images/salt.png',
        ammonia: 'images/chemical.png',
        muriaticAcid: 'images/acid.png',
        oxygenGas: 'images/gas-gas.png',
        ammoniumIon: 'images/chemical.png',
        methane: 'images/gas-gas.png',
        phosphoricAcid: 'images/chemical.png',
        hydrogenSulfate: 'images/powder.png',
        nitrogenMonoxide: 'images/chemical.png',
        potassiumNitrate: 'images/gas.png',
        magnesiumSulfide: 'images/powder.png',
        ironOxide: 'images/powder.png',
        aluminumChloride: 'images/powder.png',
        dinitrogenTetroxide: 'images/chemical.png',
        calciumHydroxide: 'images/powder.png',
        sulfurHexafluoride: 'images/gas-gas.png',
        phosphorusPentachloride: 'images/powder.png',
    };

    let elementsInReaction = [];

    document.addEventListener('DOMContentLoaded', function () {
        const elementsWithTooltip = document.querySelectorAll('.draggable-element');
    
        elementsWithTooltip.forEach(element => {
            element.addEventListener('mouseover', function () {
                const elementSymbol = this.textContent;
                const tooltip = document.getElementById(`tooltip-${elementSymbol}`);
                if (tooltip) {
                    const rect = this.getBoundingClientRect();
                    const windowWidth = window.innerWidth;
                    const windowHeight = window.innerHeight;
                    const tooltipWidth = tooltip.offsetWidth;
                    const tooltipHeight = tooltip.offsetHeight;
    
                    // Calculate the position to center the tooltip slightly to the left and top
                    const left = (windowWidth - tooltipWidth) / 2 - (windowWidth * 0.3); // Centered and 5% from the left
                    const top = (windowHeight - tooltipHeight) / 2 - (windowHeight * 0.3); // Centered and 5% from the top
    
                    tooltip.style.left = left + 'px';
                    tooltip.style.top = top + 'px';
    
                    tooltip.style.display = 'block';
                }
            });
    
            element.addEventListener('mouseout', function () {
                const elementSymbol = this.textContent;
                const tooltip = document.getElementById(`tooltip-${elementSymbol}`);
                if (tooltip) {
                    tooltip.style.display = 'none';
                }
            });
        });
    });
    

    document.querySelectorAll('.draggable-element').forEach(element => {
        element.addEventListener('dragstart', function(event) {
            const info = element.getAttribute('data-info');
            const [symbol, state] = info.split('|');
    
            const dragIcon = new Image();
            dragIcon.src = stateIcons[state];
            dragIcon.width = 30;
            dragIcon.height = 30;
    
            dragging = true;
            event.target.style.transform = 'scale(1.5)';
    
            event.dataTransfer.setData('text/plain', `${symbol}|${state}`);
            event.dataTransfer.setDragImage(dragIcon, dragIcon.width / 2, dragIcon.height / 2);
        });
    });
    

    // When the drag operation ends
    document.addEventListener('dragend', function(event) {
        dragging = false;
        event.target.style.transform = '';
    });

    const reactionArea = document.querySelector('.reaction-area');
    const clearAreaButton = document.querySelector('.clear-area');

    reactionArea.addEventListener('dragover', function (event) {
        event.preventDefault();
    });

    const dropletSound = document.getElementById("waterDropSound");

    reactionArea.addEventListener('drop', function (event) {
        event.preventDefault();
        dropletSound.play();

        const data = event.dataTransfer.getData('text/plain');
        const [symbol, state] = data.split('|');

        const element = {
            symbol: symbol,
            state: state,
            icon: stateIcons[state]
        };

        elementsInReaction.push(element);
        // checkCompounds();
        updateReactionArea();

        const compoundFormulas = {
            water: ['H', 'H', 'O'],
            carbonDioxide: ['C', 'O', 'O'],
            ammonia: ['H', 'H', 'N', 'H'],
            salt: ['Na', 'Cl'],
            muriaticAcid: ['H', 'Cl'],
            aceticAcid: ['C', 'H', 'O', 'O'],
            oxygenGas: ['O', 'O'],
            ammoniumIon: ['N', 'H', 'H', 'H'],
            methane: ['H', 'H', 'H', 'H', 'H'],
            phosphoricAcid: ['H', 'H', 'H', 'H', 'H', 'P', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'],
            hydrogenSulfate: ['H', 'S', 'O', 'O'],
            nitrogenMonoxide: ['N', 'O'],
            potassiumNitrate: ['K', 'N', 'O', 'O', 'O'],
            magnesiumSulfide: ['Mg', 'S'],
            ironOxide: ['Fe', 'O', 'O', 'O'],
            aluminumChloride: ['Al', 'Cl', 'Cl', 'Cl'],
            dinitrogenTetroxide: ['N', 'N', 'O', 'O', 'O', 'O'],
            calciumHydroxide: ['Ca', 'O', 'O', 'H', 'H'],
            sulfurHexafluoride: ['S', 'F', 'F', 'F', 'F', 'F', 'F'],
            phosphorusPentachloride: ['P', 'Cl', 'Cl', 'Cl', 'Cl', 'Cl']
        };

        for (const compound in compoundFormulas) {
            if (canCombine(elementsInReaction, compoundFormulas[compound])) {
                elementsInReaction = combineElements(elementsInReaction, compoundFormulas[compound], compound, compound.charAt(0).toUpperCase() + compound.slice(1));
                updateReactionArea();
                break;
            }
        }
    });

    clearAreaButton.addEventListener('click', function() {
        elementsInReaction.length = 0;
        updateReactionArea();
    });

    function canCombine(elements, requiredElements) {
        const elementCounts = countElements(elements);
    
        // Check if existing elements allow for the combination of requiredElements
        for (const requiredElement of requiredElements) {
            if (!(requiredElement in elementCounts) || elementCounts[requiredElement] < requiredElements.filter(el => el === requiredElement).length) {
                return false;
            }
        }
    
        // Check if there are enough available elements to form the required compound
        const remainingElements = { ...elementCounts };
    
        for (const requiredElement of requiredElements) {
            if (remainingElements[requiredElement] && remainingElements[requiredElement] > 0) {
                remainingElements[requiredElement]--;
            } else {
                return false;
            }
        }
    
        return true;
    }
    

    function countElements(elements) {
        const elementCounts = {};
        elements.forEach(element => {
            elementCounts[element.symbol] = (elementCounts[element.symbol] || 0) + 1;
        });
        return elementCounts;
    }

    function combineElements(elements, requiredElements, compound, compoundName) {
        const combinedElements = [...elements];

        for (const requiredElement of requiredElements) {
            const index = combinedElements.findIndex(el => el.symbol === requiredElement);
            combinedElements.splice(index, 1);
        }

        const compoundInfo = getCompoundInfo(compound);

        const compoundElement = {
            symbol: `${compoundInfo.symbol} (${compoundName})`,
            state: compoundInfo.state,
            icon: compoundInfo.icon
        };

        combinedElements.push(compoundElement);
        return combinedElements;
    }

    function getCompoundInfo(compound) {
        const compoundData = {
            water: { symbol: 'H2O', icon: stateIcons.water, state: 'liquid' },
            carbonDioxide: { symbol: 'CO2', icon: stateIcons.carbonDioxide, state: 'gas' },
            ammonia: { symbol: 'NH3', icon: stateIcons.ammonia, state: 'gas' },
            salt: { symbol: 'NaCl', icon: stateIcons.salt, state: 'solid' },
            muriaticAcid: { symbol: 'HCl', icon: stateIcons.muriaticAcid, state: 'gas' },
            aceticAcid: { symbol: 'C2H4O2', icon: stateIcons.aceticAcid, state: 'liquid' },
            oxygenGas: { symbol: 'O2', icon: stateIcons.oxygenGas, state: 'gas' },
            ammoniumIon: { symbol: 'NH4+', icon: stateIcons.ammoniumIon, state: 'solid' },
            methane: { symbol: 'CH4', icon: stateIcons.methane, state: 'gas' },
            phosphoricAcid: { symbol: 'H5P3O10', icon: stateIcons.phosphoricAcid, state: 'liquid' },
            hydrogenSulfate: { symbol: 'HSO4', icon: stateIcons.hydrogenSulfate, state: 'solid' },
            nitrogenMonoxide: { symbol: 'NO', icon: stateIcons.nitrogenMonoxide, state: 'gas' },
            potassiumNitrate: { symbol: 'KNO3', icon: stateIcons.potassiumNitrate, state: 'solid' },
            magnesiumSulfide: { symbol: 'MgS', icon: stateIcons.magnesiumSulfide, state: 'solid' },
            ironOxide: { symbol: 'Fe2O3', icon: stateIcons.ironOxide, state: 'solid' },
            aluminumChloride: { symbol: 'AlCl3', icon: stateIcons.aluminumChloride, state: 'solid' },
            dinitrogenTetroxide: { symbol: 'N2O4', icon: stateIcons.dinitrogenTetroxide, state: 'gas' },
            calciumHydroxide: { symbol: 'Ca(OH)2', icon: stateIcons.calciumHydroxide, state: 'solid' },
            sulfurHexafluoride: { symbol: 'SF6', icon: stateIcons.sulfurHexafluoride, state: 'gas' },
            phosphorusPentachloride: { symbol: 'PCl5', icon: stateIcons.phosphorusPentachloride, state: 'solid' }
            // Add more compounds here
        };

        return compoundData[compound] || { symbol: '', icon: '', state: '' };
    }

    function updateReactionArea() {
        reactionArea.innerHTML = '';
        elementsInReaction.forEach(element => {
            const elementElement = document.createElement('div');
            elementElement.textContent = `${element.symbol} `;
            const iconElement = document.createElement('img');
            iconElement.src = element.icon;
            iconElement.width = 20;
            iconElement.height = 20;
            elementElement.appendChild(iconElement);
            reactionArea.appendChild(elementElement);
        });
    }

    function checkCompounds() {
        const compoundFormulas = {
            water: [{ symbol: 'H', count: 2 }, { symbol: 'O', count: 1 }],
            carbonDioxide: [{ symbol: 'C', count: 1 }, { symbol: 'O', count: 2 }],
            ammonia: [{ symbol: 'H', count: 3 }, { symbol: 'N', count: 1 }],
            salt: [{ symbol: 'Na', count: 1 }, { symbol: 'Cl', count: 1 }],
            muriaticAcid: [{ symbol: 'H', count: 1 }, { symbol: 'Cl', count: 1 }],
            aceticAcid: [{ symbol: 'C', count: 2 }, { symbol: 'H', count: 4 }, { symbol: 'O', count: 2 }],
            oxygenGas: [{ symbol: 'O', count: 2 }],
            ammoniumIon: [{ symbol: 'N', count: 1 }, { symbol: 'H', count: 4 }],
            methane: [{ symbol: 'C', count: 1 }, { symbol: 'H', count: 4 }],
            phosphoricAcid: [{ symbol: 'H', count: 3 }, { symbol: 'P', count: 1 }, { symbol: 'O', count: 4 }],
            hydrogenSulfate: [{ symbol: 'H', count: 1 }, { symbol: 'S', count: 1 }, { symbol: 'O', count: 4 }],
            nitrogenMonoxide: [{ symbol: 'N', count: 1 }, { symbol: 'O', count: 1 }],
            potassiumNitrate: [{ symbol: 'K', count: 1 }, { symbol: 'N', count: 1 }, { symbol: 'O', count: 3 }],
            magnesiumSulfide: [{ symbol: 'Mg', count: 1 }, { symbol: 'S', count: 1 }],
            ironOxide: [{ symbol: 'Fe', count: 2 }, { symbol: 'O', count: 3 }],
            aluminumChloride: [{ symbol: 'Al', count: 2 }, { symbol: 'Cl', count: 3 }],
            dinitrogenTetroxide: [{ symbol: 'N', count: 2 }, { symbol: 'O', count: 4 }],
            calciumHydroxide: [{ symbol: 'Ca', count: 1 }, { symbol: 'O', count: 2 }, { symbol: 'H', count: 2 }],
            sulfurHexafluoride: [{ symbol: 'S', count: 1 }, { symbol: 'F', count: 6 }],
            phosphorusPentachloride: [{ symbol: 'P', count: 1 }, { symbol: 'Cl', count: 5 }]
        };
    
        for (const compound in compoundFormulas) {
            const { elements, icon } = compoundFormulas[compound];
    
            if (canCombine(elementsInReaction, elements)) {
                elementsInReaction = combineElements(elementsInReaction, elements, compound, icon);
                updateReactionArea();
                break;
            }
        }
    }
});
