document.addEventListener('DOMContentLoaded', function() {
    const stateIcons = {

        //for dragging
        gas: 'images/gas.png',
        liquid: 'images/liquid.png',
        solid: 'images/solid.png',

        //for result
        water: 'images/liquid.png',             
        aceticAcid: 'images/acid.png', 
        co2: 'images/gas-gas.png',            
        salt: 'images/salt.png',
        ammonia: 'images/chemical.png',    
        hcl: 'images/acid.png',
        oxygenGas: 'images/gas-gas.png', 
        ammoniumIon: 'images/chemical.png', 
        methane: 'images/gas-gas.png',      
        phosphoricAcid: 'images/chemical.png', 
    };

    let elementsInReaction = [];

    document.querySelectorAll('.draggable-element').forEach(element => {
        element.addEventListener('dragstart', function(event) {
            const symbol = element.textContent;
            const state = element.getAttribute('data-state');
            const dragIcon = new Image();
            dragIcon.src = stateIcons[state];
            dragIcon.width = 30;
            dragIcon.height = 30;
            event.dataTransfer.setData('text/plain', `${symbol}|${state}`);
            event.dataTransfer.setDragImage(dragIcon, dragIcon.width / 2, dragIcon.height / 2);
        });
    });

    const reactionArea = document.querySelector('.reaction-area');
    const clearAreaButton = document.querySelector('.clear-area');

    reactionArea.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    reactionArea.addEventListener('drop', function(event) {
        event.preventDefault();

        const data = event.dataTransfer.getData('text/plain');
        const [symbol, state] = data.split('|');

        const element = {
            symbol: symbol,
            state: state,
            icon: stateIcons[state]
        };

        elementsInReaction.push(element);
        updateReactionArea();

        const waterElements = ['H', 'H', 'O'];
        const co2Elements = ['C', 'O', 'O'];
        const ammoniaElements = ['H', 'H', 'N', 'H'];
        const saltElements = ['Na', 'Cl'];
        const hclElements = ['H', 'Cl'];
        const aceticAcidElements = ['C', 'H', 'O', 'O'];
        const oxygenGasElements = ['O', 'O'];
        const ammoniumIonElements = ['N', 'H', 'H', 'H'];
        const methaneElements = ['H', 'H', 'H', 'H', 'H'];
        const phosphoricAcidElements = ['H', 'H', 'H', 'H', 'H', 'P', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'];

        if (canCombine(elementsInReaction, waterElements)) {
            elementsInReaction = combineElements(elementsInReaction, waterElements, 'water', 'Water');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, co2Elements)) {
            elementsInReaction = combineElements(elementsInReaction, co2Elements, 'co2', 'Carbon Dioxide');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, ammoniaElements)) {
            elementsInReaction = combineElements(elementsInReaction, ammoniaElements, 'ammonia', 'Ammonia');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, saltElements)) {
            elementsInReaction = combineElements(elementsInReaction, saltElements, 'salt', 'Salt');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, hclElements)) {
            elementsInReaction = combineElements(elementsInReaction, hclElements, 'hcl', 'Hydrochloric Acid');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, aceticAcidElements)) {
            elementsInReaction = combineElements(elementsInReaction, aceticAcidElements, 'aceticAcid', 'Acetic Acid');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, oxygenGasElements)) {
            elementsInReaction = combineElements(elementsInReaction, oxygenGasElements, 'oxygenGas', 'Oxygen Gas');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, ammoniumIonElements)) {
            elementsInReaction = combineElements(elementsInReaction, ammoniumIonElements, 'ammoniumIon+', 'Ammonium Ion');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, methaneElements)) {
            elementsInReaction = combineElements(elementsInReaction, methaneElements, 'methane', 'Methane');
            updateReactionArea();
        } else if (canCombine(elementsInReaction, phosphoricAcidElements)) {
            elementsInReaction = combineElements(elementsInReaction, phosphoricAcidElements, 'phosphoricAcid', 'Phosphoric Acid');
            updateReactionArea();
        }

    });

    clearAreaButton.addEventListener('click', function() {
        elementsInReaction.length = 0;
        updateReactionArea();
    });

    function canCombine(elements, requiredElements) {
        const elementCounts = countElements(elements);
        for (const requiredElement of requiredElements) {
            if (!(requiredElement in elementCounts) || elementCounts[requiredElement] < requiredElements.filter(el => el === requiredElement).length) {
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
        
        let compoundSymbol = '';
        let compoundIcon = '';
        let compoundState = '';

        switch (compound) {
            case 'water':
                compoundSymbol = 'H2O';
                compoundIcon = stateIcons.water;
                compoundState = 'liquid';
                break;
            case 'co2':
                compoundSymbol = 'CO2';
                compoundIcon = stateIcons.co2;
                compoundState = 'gas';
                break;
            case 'ammonia':
                compoundSymbol = 'NH3';
                compoundIcon = stateIcons.ammonia;
                compoundState = 'gas';
                break;
            case 'salt':
                compoundSymbol = 'NaCl';
                compoundIcon = stateIcons.salt;
                compoundState = 'solid';
                break;
            case 'hcl':
                compoundSymbol = 'HCl';
                compoundIcon = stateIcons.hcl;
                compoundState = 'gas';
                break;
            case 'aceticAcid':
                compoundSymbol = 'C2H4O2';
                compoundIcon = stateIcons.aceticAcid;
                compoundState = 'liquid';
                break;
            case 'oxygenGas':
                compoundSymbol = 'O2';
                compoundIcon = stateIcons.oxygenGas;
                compoundState = 'gas';
                break;
            case 'ammoniumIon':
                compoundSymbol = 'NH4+';
                compoundIcon = stateIcons.ammoniumIon;
                compoundState = 'solid';
                break;
            case 'methane':
                compoundSymbol = 'CH4';
                compoundIcon = stateIcons.methane;
                compoundState = 'gas';
                break;
            case 'phosphoricAcid':
                compoundSymbol = 'H5P3O10';
                compoundIcon = stateIcons.phosphoricAcid;
                compoundState = 'liquid';
                break;
            // Add more cases for other compounds here
        }

    
        const compoundElement = {
            symbol: `${compoundSymbol} (${compoundName.charAt(0).toUpperCase() + compoundName.slice(1)})`,
            state: compoundState,
            icon: compoundIcon
        };
        combinedElements.push(compoundElement);
        return combinedElements;
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
});
