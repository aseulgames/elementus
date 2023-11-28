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
        sodiumHydroxide: 'images/chemical.png',
        carbonMonoxide: 'images/gas.png',
        sulfuricAcid: 'images/acid.png',
        nitrogenDioxide: 'images/chemical.png',
        calciumCarbonate: 'images/powder.png',
        hydrogenPeroxide: 'images/liquid.png',
        aluminumOxide: 'images/powder.png',
        potassiumChloride: 'images/powder.png',
        methaneBromide: 'images/chemical.png',
        phosphorusTrichloride: 'images/powder.png',
        bariumSulfate: 'images/powder.png',
        sulfurDioxide: 'images/chemical.png',
        diphosphorusPentoxide: 'images/powder.png',
        sodiumChloride: 'images/powder.png',
        calciumOxide: 'images/powder.png',
        tetraphosphorusDecoxide: 'images/powder.png',
        sodiumBromide: 'images/powder.png',
    };

    let elementsInReaction = [];
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
        phosphorusPentachloride: [{ symbol: 'P', count: 1 }, { symbol: 'Cl', count: 5 }],
        sodiumHydroxide: [{ symbol: 'Na', count: 1 }, { symbol: 'O', count: 1 }, { symbol: 'H', count: 1 }],
        carbonMonoxide: [{ symbol: 'C', count: 1 }, { symbol: 'O', count: 1 }],
        sulfuricAcid: [{ symbol: 'H', count: 2 }, { symbol: 'S', count: 1 }, { symbol: 'O', count: 4 }],
        nitrogenDioxide: [{ symbol: 'N', count: 1 }, { symbol: 'O', count: 2 }],
        calciumCarbonate: [{ symbol: 'Ca', count: 1 }, { symbol: 'C', count: 1 }, { symbol: 'O', count: 3 }],
        hydrogenPeroxide: [{ symbol: 'H', count: 2 }, { symbol: 'O', count: 2 }],
        aluminumOxide: [{ symbol: 'Al', count: 2 }, { symbol: 'O', count: 3 }],
        potassiumChloride: [{ symbol: 'K', count: 1 }, { symbol: 'Cl', count: 1 }],
        methaneBromide: [{ symbol: 'C', count: 1 }, { symbol: 'H', count: 4 }, { symbol: 'Br', count: 1 }],
        phosphorusTrichloride: [{ symbol: 'P', count: 1 }, { symbol: 'Cl', count: 3 }],
        bariumSulfate: [{ symbol: 'Ba', count: 1 }, { symbol: 'S', count: 1 }, { symbol: 'O', count: 4 }],
        sulfurDioxide: [{ symbol: 'S', count: 1 }, { symbol: 'O', count: 2 }],
        diphosphorusPentoxide: [{ symbol: 'P', count: 2 }, { symbol: 'O', count: 5 }],
        sodiumChloride: [{ symbol: 'Na', count: 1 }, { symbol: 'Cl', count: 1 }],
        calciumOxide: [{ symbol: 'Ca', count: 1 }, { symbol: 'O', count: 1 }],
        tetraphosphorusDecoxide: [{ symbol: 'P', count: 4 }, { symbol: 'O', count: 10 }],
        sodiumBromide: [{ symbol: 'Na', count: 1 }, { symbol: 'Br', count: 1 }],
    };

    document.addEventListener('DOMContentLoaded', function () {
        console.log('DOMContentLoaded event fired'); // Add this line
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
        function setNewGoal() {
            goalCompound = getRandomGoal();
            updateGoalArea();
            elementsInReaction = [];
            updateReactionArea();
            console.log('New Goal Set:', goalCompound);
        }
        
    
        function getRandomGoal() {
            const compounds = Object.keys(compoundFormulas);
            const randomCompound = compounds[Math.floor(Math.random() * compounds.length)];
            const compoundInfo = compoundFormulas[randomCompound];
        
            let formula = '';
            let icon = 'default-icon.png';
        
            if (compoundInfo) {
                formula = compoundInfo.map(element => element.symbol).join('');
                icon = stateIcons[randomCompound] || icon;
            }
        
            return {
                name: randomCompound,
                formula: formula,
                icon: icon
            };
        }
        
        
        
        
    
        // Display the initial goal
        setNewGoal();
    
        function updateGoalArea() {
            const goalArea = document.querySelector('.goal-box');
            goalArea.innerHTML = `GOAL: ${goalCompound.name}`;
    
            const goalIcon = document.createElement('img');
            goalIcon.src = goalCompound.icon;
            goalIcon.width = 20;
            goalIcon.height = 20;
    
            goalArea.appendChild(goalIcon);
        }
    
        
        
    });

    function checkGoal() {
        const userFormula = elementsInReaction.map(element => element.symbol).join('');
        console.log('User Formula:', userFormula); // Add this line
    
        if (userFormula === goalCompound.formula) {
            // If the user has successfully created the current goal, set a new goal
            setNewGoal();
            showSuccessPopup();
        }
    }

    function showSuccessPopup() {
        // Add code to display a success popup
        console.log('Success!'); // For now, let's just log a message
    }
    

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
        updateReactionArea(); // Call updateReactionArea() here
    });
    

    clearAreaButton.addEventListener('click', function() {
        elementsInReaction.length = 0;
        updateReactionArea();
    });

    function canCombine(elements, requiredElements) {
        const elementCounts = countElements(elements);

        for (const requiredElement of requiredElements) {
            if (!(requiredElement.symbol in elementCounts) || elementCounts[requiredElement.symbol] < requiredElement.count) {
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

        checkCompounds();
        checkGoal();
        console.log('Update Reaction Area executed'); // Add this line
    }
    
    function checkCompounds() {
        let combined = false;
    
        for (const compound in compoundFormulas) {
            const elements = compoundFormulas[compound];
            if (canCombine(elementsInReaction, elements)) {
                elementsInReaction = combineElements(elementsInReaction, elements, compound);
                combined = true;
            }
        }
    
        if (combined) {
            updateReactionArea();
        }
    }
    

    function combineElements(elements, requiredElements, compound) {
        const combinedElements = [...elements];
        for (const requiredElement of requiredElements) {
            const { symbol, count } = requiredElement;
            const index = combinedElements.findIndex(el => el.symbol === symbol);
            for (let i = 0; i < count; i++) {
                combinedElements.splice(index, 1);
            }
        }
        const compoundElement = { symbol: compound, state: 'unknown', icon: stateIcons[compound] };
        combinedElements.push(compoundElement);
        return combinedElements;
    }

    let goalCompound = {
        name: 'Water',
        formula: 'H2O',
        icon: 'images/liquid.png'
    };
    
    // Display the initial goal
    updateGoalArea();
    
    function updateGoalArea() {
        const goalArea = document.querySelector('.goal-box');
        goalArea.innerHTML = `GOAL: ${goalCompound.name}`;
    
        const goalIcon = document.createElement('img');
        goalIcon.src = goalCompound.icon;
        goalIcon.width = 20;
        goalIcon.height = 20;
    
        goalArea.appendChild(goalIcon);
    }
    
    function setNewGoal() {
        goalCompound = getRandomGoal();
        updateGoalArea();
        elementsInReaction = [];
        updateReactionArea();
        console.log('New Goal Set:', goalCompound);
    }
    
    function getRandomGoal() {
        const compounds = Object.keys(compoundFormulas);
        const randomCompound = compounds[Math.floor(Math.random() * compounds.length)];
        const compoundInfo = compoundFormulas[randomCompound];
    
        let formula = '';
        let icon = 'default-icon.png';
    
        if (compoundInfo) {
            formula = compoundInfo.map(element => element.symbol).join('');
            icon = stateIcons[randomCompound] || icon; // Use the compound name here
        }
    
        return {
            name: randomCompound,
            formula: formula,
            icon: icon
        };
    }
    
    
    // Display the initial goal
    setNewGoal();

    const popup = document.querySelector('.popup');
    const overlay = document.querySelector('.overlay');
    const closeButton = document.getElementById('close');
    const okayButton = document.getElementById('okay');

    // Check if the user has seen the popup before
    const hasSeenPopup = localStorage.getItem('hasSeenPopup');

    // If the user has not seen the popup, show it
    if (!hasSeenPopup) {
        popup.style.display = 'block';
        overlay.style.display = 'block';
    }

    // Close the popup when the close button is clicked
    closeButton.addEventListener('click', function () {
        popup.style.display = 'none';
        overlay.style.display = 'none';
        // Set a flag to indicate that the user has seen the popup
        localStorage.setItem('hasSeenPopup', 'true');
    });

    // Close the popup when the "Got it!" button is clicked
    okayButton.addEventListener('click', function () {
        popup.style.display = 'none';
        overlay.style.display = 'none';
        // Set a flag to indicate that the user has seen the popup
        localStorage.setItem('hasSeenPopup', 'true');
    });
});


