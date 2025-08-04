$(document).ready(function() {

    // Données extraites du PDF
    // EA (Échec Automatique) est représenté par 0
    // RA (Réussite Automatique) est représenté par 99
    const combatTable = [
        // DEF->     1   2   3   4   5   6   7   8   9  10  11  12  13  14  15  16  17  18  19  20  21  22
        /* AT 1 */ [ 1,  3,  5,  7,  9, 11, 13, 15, 17, 19, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99],
        /* AT 2 */ [ 1,  2,  4,  6,  8, 10, 12, 14, 16, 18, 19, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99],
        /* AT 3 */ [ 1,  2,  3,  5,  7,  9, 11, 13, 15, 17, 18, 19, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99],
        /* AT 4 */ [ 0,  1,  2,  4,  6,  8, 10, 12, 14, 16, 18, 18, 19, 99, 99, 99, 99, 99, 99, 99, 99, 99],
        /* AT 5 */ [ 0,  1,  2,  4,  5,  7,  9, 11, 13, 15, 17, 18, 18, 19, 19, 99, 99, 99, 99, 99, 99, 99],
        /* AT 6 */ [ 0,  0,  1,  3,  5,  6,  8, 10, 12, 14, 16, 17, 18, 18, 19, 19, 99, 99, 99, 99, 99, 99],
        /* AT 7 */ [ 0,  0,  1,  3,  4,  6,  7,  9, 11, 13, 15, 17, 17, 18, 18, 19, 19, 99, 99, 99, 99, 99],
        /* AT 8 */ [ 0,  0,  0,  2,  4,  5,  7,  8, 10, 12, 14, 16, 17, 17, 18, 18, 19, 19, 99, 99, 99, 99],
        /* AT 9 */ [ 0,  0,  0,  2,  3,  5,  7,  8,  9, 11, 13, 15, 15, 17, 17, 18, 18, 19, 19, 99, 99, 99],
        /* AT 10*/ [ 0,  0,  0,  1,  3,  4,  6,  8,  8, 10, 12, 14, 16, 16, 17, 17, 18, 18, 19, 19, 99, 99],
        /* AT 11*/ [ 0,  0,  0,  1,  2,  4,  6,  7,  8,  9, 11, 13, 14, 15, 16, 16, 17, 17, 18, 18, 19, 99],
        /* AT 12*/ [ 0,  0,  0,  0,  2,  3,  5,  7,  7,  9, 11, 11, 13, 14, 15, 15, 16, 16, 17, 17, 18, 18],
        /* AT 13*/ [ 0,  0,  0,  0,  1,  3,  5,  6,  7,  8, 10, 11, 12, 13, 14, 15, 15, 16, 16, 17, 17, 18],
        /* AT 14*/ [ 0,  0,  0,  0,  1,  2,  4,  6,  6,  8, 10, 10, 12, 12, 13, 14, 14, 15, 15, 16, 16, 17],
        /* AT 15*/ [ 0,  0,  0,  0,  0,  2,  4,  5,  6,  7,  9, 10, 11, 12, 13, 14, 14, 15, 15, 16, 16, 17],
        /* AT 16*/ [ 0,  0,  0,  0,  0,  1,  3,  5,  5,  7,  9,  9, 10, 11, 13, 13, 14, 14, 15, 15, 16, 16],
        /* AT 17*/ [ 0,  0,  0,  0,  0,  1,  3,  4,  5,  6,  8,  8,  9, 10, 12, 13, 14, 14, 15, 15, 16, 16],
        /* AT 18*/ [ 0,  0,  0,  0,  0,  0,  2,  4,  4,  6,  8,  8,  9, 10, 11, 12, 14, 14, 15, 15, 16, 16],
        /* AT 19*/ [ 0,  0,  0,  0,  0,  0,  2,  3,  4,  5,  7,  7,  8,  9, 11, 11, 13, 14, 15, 15, 16, 16],
        /* AT 20*/ [ 0,  0,  0,  0,  0,  0,  1,  3,  3,  5,  6,  7,  7,  8, 10, 11, 12, 13, 15, 15, 16, 16],
        /* AT 21*/ [ 0,  0,  0,  0,  0,  0,  1,  2,  3,  4,  5,  6,  6,  7,  9, 10, 11, 12, 14, 15, 16, 17],
        /* AT 22*/ [ 0,  0,  0,  0,  0,  0,  0,  2,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 13, 14, 16, 17]
    ];

    const localizedStrikeRules = {
        "Tête (difficile)": [-5, 0],
        "Zone génitale (difficile)": [-5, 0],
        "Torse (facile)": [2, 0],
        "Bras armé (assez facile)": [1, 0],
        "Bras désarmé (assez facile)": [1, -1],
        "Jambes (un peu moins facile)": [-1, -1]
    };

    let cardIdCounter = 0;

    // --- Fonctions ---

    function createCardElement(cardData) {
        const isOpponent = cardData.type === 'opponent';
        const flankChecked = cardData.flank ? 'checked' : '';
        const backChecked = cardData.back ? 'checked' : '';
        return `
            <div class="card mb-3 char-card ${isOpponent ? 'opponent' : ''}" id="${cardData.id}" data-type="${cardData.type}">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                           <input type="text" class="form-control form-control-sm name-input" placeholder="Nom du personnage" value="${cardData.name || ''}">
                        </h5>
                        <button class="btn-close delete-card" aria-label="Close"></button>
                    </div>
                    <div class="row g-2 align-items-end">
                        <div class="col-auto">
                            <label class="form-label small">Attaque</label>
                            <input type="number" class="form-control form-control-sm stat-input attack-input" value="${cardData.attack}" min="1" max="22" style="width: 75px;">
                        </div>
                        <div class="col-auto" style="width: 75px;">
                            <label class="form-label small">+/-</label>
                            <input type="number" class="form-control form-control-sm stat-input attack-bonus-input" value="${cardData.attackBonus || 0}">
                        </div>
                        <div class="col-auto">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input tactical-pos-input" type="checkbox" value="2" id="flank-${cardData.id}" ${flankChecked}>
                                <label class="form-check-label small" for="flank-${cardData.id}">Flanc</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input tactical-pos-input" type="checkbox" value="5" id="back-${cardData.id}" ${backChecked}>
                                <label class="form-check-label small" for="back-${cardData.id}">Arrière</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 g-2 align-items-end">
                        <div class="col-auto">
                            <label class="form-label small">PRD</label>
                            <input type="number" class="form-control form-control-sm stat-input prd-input" value="${cardData.prd}" min="1" max="22" style="width: 75px;">
                        </div>
                        <div class="col-auto" style="width: 75px;">
                            <label class="form-label small">+/-</label>
                            <input type="number" class="form-control form-control-sm stat-input prd-bonus-input" value="${cardData.prdBonus || 0}">
                        </div>
                        <div class="col-auto">
                            <label class="form-label small">ESQ</label>
                            <input type="number" class="form-control form-control-sm stat-input esq-input" value="${cardData.esq}" min="1" max="22" style="width: 75px;">
                        </div>
                        <div class="col-auto" style="width: 75px;">
                            <label class="form-label small">+/-</label>
                            <input type="number" class="form-control form-control-sm stat-input esq-bonus-input" value="${cardData.esqBonus || 0}">
                        </div>
                    </div>
                    <div class="row mt-2 g-2 align-items-center">
                        <div class="col-auto">
                            <div class="d-flex align-items-center justify-content-end">
                                <label class="form-label small mb-0 me-2">Soutien</label>
                                <input type="number" class="form-control form-control-sm stat-input support-input" value="${cardData.support || 0}" min="0" style="width: 75px;">
                            </div>
                        </div>
                        ${isOpponent ? `
                        <div class="col-auto">
                            <div class="d-flex align-items-center justify-content-end">
                                <label class="form-label small mb-0 me-2">Puissant</label>
                                <select class="form-select form-select-sm stat-input powerful-input" style="width: 120px;">
                                    <option value="" ${cardData.powerful === '' ? 'selected' : ''}>-</option>
                                    <option value="3" ${cardData.powerful === '3' ? 'selected' : ''}>Puissant+</option>
                                    <option value="6" ${cardData.powerful === '6' ? 'selected' : ''}>Puissant++</option>
                                    <option value="impossible" ${cardData.powerful === 'impossible' ? 'selected' : ''}>Puissant+++</option>
                                </select>
                            </div>
                        </div>
                        ` : ''}
                    </div>
                </div>
            </div>`;
    }

    function addCard(type) {
        cardIdCounter++;
        const cardId = `card-${cardIdCounter}`;
        const cardData = {
            id: cardId,
            type: type,
            name: '',
            attack: 10,
            prd: 10,
            prdBonus: 0,
            esq: 10,
            esqBonus: 0,
            attackBonus: 0,
            support: 0,
            powerful: '',
            flank: false,
            back: false
        };
        const cardHtml = createCardElement(cardData);
        const container = type === 'opponent' ? '#opponent-cards' : '#player-cards';
        $(container).append(cardHtml);
        saveState();
    }

    function getThreshold(attackerAt, defenderDef) {
        // Conditions pour Échec Auto
        if (attackerAt < 1 || defenderDef > 22) { // Attaquant trop faible OU Défenseur trop fort
            return 0; // Échec Auto
        }
        // Conditions pour Réussite Auto
        if (attackerAt > 22 || defenderDef < 1) { // Attaquant trop fort OU Défenseur trop faible
            return 99; // Réussite Auto
        }
        // Accès normal au tableau si dans les limites 1-22
        return combatTable[defenderDef - 1][attackerAt - 1];
    }

    function displayResult(value, type = '') {
        if (value === "N/A" || value <= 0) return '<span class="text-danger">Échec Auto</span>';
        if (value === "impossible") return '<span class="text-primary">Parade impossible</span>';        
        if (value === 99) {
            if (type === 'prd') return '<span class="text-primary">Réussite Auto</span>';
            return '<span class="text-success">Réussite Auto</span>';
        }
        return `${value}`;
    }

    function calculateAndDisplayResults() {
        const selectedPlayer = $('.char-card:not(.opponent).selected');
        const selectedOpponent = $('.char-card.opponent.selected');
        const resultsContainer = $('#results-container');

        if (selectedPlayer.length === 0 || selectedOpponent.length === 0) {
            resultsContainer.html('<p>Sélectionnez un joueur et un adversaire.</p>');
            return;
        }

        const playerName = selectedPlayer.find('.name-input').val() || "Joueur";
        const playerAt = parseInt(selectedPlayer.find('.attack-input').val());
        const playerAttackBonus = parseInt(selectedPlayer.find('.attack-bonus-input').val()) || 0;
        const playerPrd = parseInt(selectedPlayer.find('.prd-input').val());
        const playerPrdBonus = parseInt(selectedPlayer.find('.prd-bonus-input').val()) || 0;
        const playerEsq = parseInt(selectedPlayer.find('.esq-input').val());
        const playerEsqBonus = parseInt(selectedPlayer.find('.esq-bonus-input').val()) || 0;
        const playerSupport = parseInt(selectedPlayer.find('.support-input').val()) || 0;
        let playerTacticalBonus = 0;
        selectedPlayer.find('.tactical-pos-input:checked').each(function() {
            playerTacticalBonus += parseInt($(this).val());
        });

        const opponentName = selectedOpponent.find('.name-input').val() || "Adversaire";
        const opponentAt = parseInt(selectedOpponent.find('.attack-input').val());
        const opponentAttackBonus = parseInt(selectedOpponent.find('.attack-bonus-input').val()) || 0;
        const opponentPrd = parseInt(selectedOpponent.find('.prd-input').val());
        const opponentPrdBonus = parseInt(selectedOpponent.find('.prd-bonus-input').val()) || 0;
        const opponentEsq = parseInt(selectedOpponent.find('.esq-input').val());
        const opponentEsqBonus = parseInt(selectedOpponent.find('.esq-bonus-input').val()) || 0;        
        const opponentSupport = parseInt(selectedOpponent.find('.support-input').val()) || 0;
        const opponentPowerful = selectedOpponent.find('.powerful-input').val() || '';
        let opponentTacticalBonus = 0;
        selectedOpponent.find('.tactical-pos-input:checked').each(function() {
            opponentTacticalBonus += parseInt($(this).val());
        });

        // Calcul du bonus/malus de soutien
        let supportModifier = 0;
        if (playerSupport > 0 && opponentSupport === 0) {
            supportModifier = playerSupport;
        } else if (opponentSupport > 0 && playerSupport === 0) {
            supportModifier = -opponentSupport;
        }

        // Calcul du bonus Puissant de l'adversaire
        let powerfulBonus = 0;
        if (opponentPowerful === '3') {
            powerfulBonus = 3;
        } else if (opponentPowerful === '6') {
            powerfulBonus = 6;
        }

        // --- Calcul des seuils --- 

        // Joueur attaque Adversaire
        const finalPlayerAt = playerAt + playerTacticalBonus + playerAttackBonus + supportModifier;
        const playerVsOpponentPrdThreshold = getThreshold(finalPlayerAt, opponentPrd + opponentPrdBonus);
        const playerVsOpponentEsqThreshold = getThreshold(finalPlayerAt, opponentEsq + opponentEsqBonus);
        
        // Adversaire attaque Joueur
        const finalOpponentAt = opponentAt + opponentTacticalBonus + opponentAttackBonus - supportModifier; // Inversé pour l'adversaire
        let opponentVsPlayerPrdThreshold;
        let opponentVsPlayerEsqThreshold;

        if (opponentPowerful === 'impossible') {
            opponentVsPlayerPrdThreshold = "impossible";
            opponentVsPlayerEsqThreshold = getThreshold(finalOpponentAt, playerEsq + playerEsqBonus);
        } else {
            opponentVsPlayerPrdThreshold = getThreshold(finalOpponentAt + powerfulBonus, playerPrd + playerPrdBonus);
            opponentVsPlayerEsqThreshold = getThreshold(finalOpponentAt, playerEsq + playerEsqBonus);
        }

        let html = `
            <div class="result-block mb-3">
                <h5 class="text-center">${playerName} attaque</h5>
                <div class="row text-center">
                    <div class="col-6">
                        <p class="fs-5 mb-0 text-primary">PRD</p>
                        <p class="fs-4">${displayResult(playerVsOpponentPrdThreshold, 'prd')}</p>
                    </div>
                    <div class="col-6">
                        <p class="fs-5 mb-0 text-success">ESQ</p>
                        <p class="fs-4">${displayResult(playerVsOpponentEsqThreshold, 'esq')}</p>
                    </div>
                </div>
                <h6>Frappes Localisées (<span class="text-primary">PRD</span> / <span class="text-success">ESQ</span>)</h6>
                <ul class="list-unstyled small">`;

            for (const [loc, rule] of Object.entries(localizedStrikeRules)) {
                const newPlayerAt = Math.max(1, Math.min(22, finalPlayerAt + rule[0]));
                const newOpponentPrd = Math.max(1, Math.min(22, (opponentPrd + opponentPrdBonus) + rule[1]));
                const newOpponentEsq = Math.max(1, Math.min(22, (opponentEsq + opponentEsqBonus) + rule[1]));
                
                let modifiedPrdThreshold = getThreshold(newPlayerAt, newOpponentPrd);
                let modifiedEsqThreshold = getThreshold(newPlayerAt, newOpponentEsq);

                html += `<li>${loc}: <span class="text-primary">${displayResult(modifiedPrdThreshold, 'prd')}</span> / <span class="text-success">${displayResult(modifiedEsqThreshold, 'esq')}</span></li>`;
            }
        html += '</ul></div>';

        html += `
            <div class="result-block">
                <h5 class="text-center">${opponentName} attaque</h5>
                <div class="row text-center">
                    <div class="col-6">
                        <p class="fs-5 mb-0 text-primary">PRD</p>
                        <p class="fs-4">${displayResult(opponentVsPlayerPrdThreshold, 'prd')}</p>
                    </div>
                    <div class="col-6">
                        <p class="fs-5 mb-0 text-success">ESQ</p>
                        <p class="fs-4">${displayResult(opponentVsPlayerEsqThreshold, 'esq')}</p>
                    </div>
                </div>
                <h6>Frappes Localisées (<span class="text-primary">PRD</span> / <span class="text-success">ESQ</span>)</h6>
                <ul class="list-unstyled small">`;

             for (const [loc, rule] of Object.entries(localizedStrikeRules)) {
                let modifiedPrdThreshold;
                if (typeof opponentVsPlayerPrdThreshold === 'number' && (opponentVsPlayerPrdThreshold === 0 || opponentVsPlayerPrdThreshold === 99)) {
                    modifiedPrdThreshold = opponentVsPlayerPrdThreshold;
                } else if (opponentPowerful === 'impossible') {
                    modifiedPrdThreshold = "impossible";
                } else {
                    const newOpponentAtPrd = Math.max(1, Math.min(22, finalOpponentAt + powerfulBonus + rule[0]));
                    const newPlayerPrd = Math.max(1, Math.min(22, (playerPrd + playerPrdBonus) + rule[1]));
                    modifiedPrdThreshold = getThreshold(newOpponentAtPrd, newPlayerPrd);
                }

                let modifiedEsqThreshold;
                if (typeof opponentVsPlayerEsqThreshold === 'number' && (opponentVsPlayerEsqThreshold === 0 || opponentVsPlayerEsqThreshold === 99)) {
                    modifiedEsqThreshold = opponentVsPlayerEsqThreshold;
                } else {
                    const newOpponentAtEsq = Math.max(1, Math.min(22, finalOpponentAt + rule[0]));
                    const newPlayerEsq = Math.max(1, Math.min(22, (playerEsq + playerEsqBonus) + rule[1]));
                    modifiedEsqThreshold = getThreshold(newOpponentAtEsq, newPlayerEsq);
                }

                html += `<li>${loc}: <span class="text-primary">${displayResult(modifiedPrdThreshold, 'prd')}</span> / <span class="text-success">${displayResult(modifiedEsqThreshold, 'esq')}</span></li>`;
            }
        html += '</ul></div>';

        resultsContainer.html(html);
    }

    function saveState() {
        const cards = [];
        $('.char-card').each(function() {
            const card = $(this);
            const isOpponent = card.data('type') === 'opponent';
            cards.push({
                id: card.attr('id'),
                type: card.data('type'),
                name: card.find('.name-input').val(),
                attack: card.find('.attack-input').val(),
                prd: card.find('.prd-input').val(),
                prdBonus: card.find('.prd-bonus-input').val(),
                esq: card.find('.esq-input').val(),
                esqBonus: card.find('.esq-bonus-input').val(),
                attackBonus: card.find('.attack-bonus-input').val(),
                support: card.find('.support-input').val(),
                powerful: isOpponent ? card.find('.powerful-input').val() : '',
                flank: card.find('.tactical-pos-input[value="2"]').is(':checked'),
                back: card.find('.tactical-pos-input[value="5"]').is(':checked')
            });
        });
        localStorage.setItem('naheulbeukCombatHelper', JSON.stringify(cards));
    }

    function loadState() {
        const savedState = localStorage.getItem('naheulbeukCombatHelper');
        if (!savedState) return;

        const cards = JSON.parse(savedState);
        let maxId = 0;
        cards.forEach(cardData => {
            const cardHtml = createCardElement(cardData);
            const container = cardData.type === 'opponent' ? '#opponent-cards' : '#player-cards';
            $(container).append(cardHtml);
            
            const idNum = parseInt(cardData.id.split('-')[1]);
            if (idNum > maxId) {
                maxId = idNum;
            }
        });
        cardIdCounter = maxId;
    }


    // --- Écouteurs d'événements ---

    $('#add-player').on('click', () => addCard('player'));
    $('#add-opponent').on('click', () => addCard('opponent'));

    // Clic sur une carte pour la sélectionner
    $(document).on('click', '.char-card', function() {
        const card = $(this);
        const type = card.data('type');
        
        // Désélectionner les autres cartes du même type
        $(`.char-card[data-type="${type}"]`).removeClass('selected');
        
        // Sélectionner la carte cliquée
        card.addClass('selected');
        
        calculateAndDisplayResults();
    });

    // Suppression d'une carte
    $(document).on('click', '.delete-card', function(e) {
        e.stopPropagation(); // Empêche le déclenchement du clic sur la carte parente
        $(this).closest('.char-card').remove();
        calculateAndDisplayResults();
        saveState();
    });

    // Mise à jour lors de la modification des stats, du nom ou des bonus
    $(document).on('input change', '.stat-input, .name-input', function() {
        calculateAndDisplayResults();
        saveState();
    });

    $(document).on('change', '.tactical-pos-input', function() {
        const card = $(this).closest('.char-card');
        if ($(this).is(':checked')) {
            card.find('.tactical-pos-input').not(this).prop('checked', false);
        }
        calculateAndDisplayResults();
        saveState();
    });

    // --- Initialisation ---
    loadState();
    calculateAndDisplayResults();

});