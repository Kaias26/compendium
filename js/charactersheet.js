var dice = {
	sides: 6,
	bonus: 0,
	throw: 1,
	roll: function () {
		var randomNumber = 0;
		for( i = 0; i < this.throw; i++ ) {
			randomNumber += Math.floor(Math.random() * this.sides) + 1;
		}
		return randomNumber + this.bonus;
	}
}

//Prints dice roll to the page
function printNumber(number) {
	var placeholder = document.getElementById( 'dice_placeholder' );
	placeholder.innerHTML = number;
}

$(document).ready( function () {
	var $button = $( '#dice_button' );

	$button.on( 'click', function() {
		var x = 0;
		dice.throw = $(this).data( 'dicethrows' );
		dice.bonus = $(this).data( 'dicebonus' );
		dice.sides = $(this).data( 'dicesides' );

		var intervalID = setInterval(() => {
			result = dice.roll();	
			printNumber( result );

			if( ++x === 20 ) {
				window.clearInterval(intervalID);
			}
		}, 50);
	});

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});

	$('input[data-checklimit]').on('change', function(evt) {
		var _limit = $(this).data( 'checklimit' );
		if($(this).siblings(':checked').length >= _limit) {
			this.checked = false;
		}
	});

    // Shop logic for step6
    if ($('#inventory-container').length) {

        const purses = {
            armes: $('#gold-armes'),
            protections: $('#gold-protections'),
            materiel: $('#gold-materiel')
        };

        const inventoryContainer = $('#inventory-container');
        const initialInventoryMessage = inventoryContainer.html();

        const hiddenInputs = {
            armes: $('#inventaire-armes-ids'),
            protections: $('#inventaire-protections-ids'),
            materiel: $('#inventaire-materiel-ids')
        };

        let purchasedItems = {
            armes: initialPurchasedItems.armes || {},
            protections: initialPurchasedItems.protections || {},
            materiel: initialPurchasedItems.materiel || {}
        };

        function showToast(message, title = 'Succès') {
            const toastClass = title === 'Erreur' ? 'bg-danger text-white' : '';
            const toastHtml = `
                <div class="toast ${toastClass}" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="toast-header">
                        <strong class="me-auto">${title}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>`;
            const toastElement = $(toastHtml);
            $('.toast-container').append(toastElement);
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
            toastElement.on('hidden.bs.toast', function () {
                $(this).remove();
            });
        }

        // Helper function to format gold amounts for display
        function formatGold(amount) {
            return amount.toFixed(2); // Format to 2 decimal places
        }

        function updateHiddenInputs() {
            for (const category in purchasedItems) {
                const items = purchasedItems[category];
                const formattedItems = Object.keys(items).map(id => `${id}:${items[id].quantity}`).join(',');
                hiddenInputs[category].val(formattedItems);
            }
        }

        // Update hidden gold inputs
        function updateGoldHiddenInputs() {
            $('#gold-armes-final').val(purses.armes.text());
            $('#gold-protections-final').val(purses.protections.text());
            $('#gold-materiel-final').val(purses.materiel.text());
        }

        function updateInventoryDisplay() {
            inventoryContainer.empty();
            let hasItems = false;

            Object.keys(purchasedItems).forEach(category => {
                // Ensure purchasedItems[category] is an object before iterating its keys
                if (typeof purchasedItems[category] !== 'object' || purchasedItems[category] === null) {
                    purchasedItems[category] = {}; // Initialize as empty object
                }

                if (Object.keys(purchasedItems[category]).length > 0) {
                    hasItems = true;
                    const categoryTitle = $('<h5>').text(category.charAt(0).toUpperCase() + category.slice(1));
                    inventoryContainer.append(categoryTitle);
                    const list = $('<ul class="list-unstyled">');

                    for (const itemId in purchasedItems[category]) {
                        const item = purchasedItems[category][itemId];
                        const { name, quantity } = item;

                        const listItem = $('<li>', {
                            'class': 'd-flex justify-content-between align-items-center mb-1'
                        });

                        const nameSpan = $('<span>').text(`${name} (x${quantity})`);
                        const buttonGroup = $('<div class="btn-group">');

                        const decreaseButton = $('<button>', {
                            'type': 'button',
                            'class': 'btn btn-sm btn-secondary btn-decrease',
                            'data-item-id': itemId,
                            'data-item-category': category,
                            'html': '<i class="fas fa-minus"></i>'
                        });

                        const increaseButton = $('<button>', {
                            'type': 'button',
                            'class': 'btn btn-sm btn-secondary btn-increase',
                            'data-item-id': itemId,
                            'data-item-category': category,
                            'html': '<i class="fas fa-plus"></i>'
                        });

                        const removeButton = $('<button>', {
                            'type': 'button',
                            'class': 'btn btn-sm btn-danger btn-remove-stack',
                            'data-item-id': itemId,
                            'data-item-category': category,
                            'html': '<i class="fas fa-trash"></i>'
                        });

                        buttonGroup.append(decreaseButton, increaseButton, removeButton);
                        listItem.append(nameSpan, buttonGroup);
                        list.append(listItem);
                    }
                    inventoryContainer.append(list);
                }
            });

            if (!hasItems) {
                inventoryContainer.html(initialInventoryMessage);
            }
        }

        $(document).on('click', '.btn-buy', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const category = button.data('item-category');
            const shopRow = button.closest('tr');
            const price = parseFloat($(`#item-${category}-${itemId}`).find('.item-price').text().replace(',', '.')) || 0;
            const purse = purses[category];
            let currentGold = parseFloat(purse.text()) || 0;

            if (currentGold >= price) {
                currentGold -= price;
                purse.text(formatGold(currentGold));
                updateGoldHiddenInputs();

                let name;
                if (purchasedItems[category][itemId]) {
                    purchasedItems[category][itemId].quantity++;
                    name = purchasedItems[category][itemId].name;
                } else {
                    name = shopRow.find('.item-name').clone().children().remove().end().text();
                    purchasedItems[category][itemId] = { name: name, price: price, quantity: 1 };
                }

                updateHiddenInputs();
                updateInventoryDisplay();
                showToast(`Acheté : ${name}.<br>Bourse restante : ${formatGold(currentGold)} PO`);
            } else {
                showToast('Pas assez d\'or dans cette bourse !', 'Erreur');
            }
        });

        inventoryContainer.on('click', '.btn-increase', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const category = button.data('item-category');
            const item = purchasedItems[category][itemId];
            const purse = purses[category];
            let currentGold = parseFloat(purse.text()) || 0;

            if (currentGold >= item.price) {
                currentGold -= item.price;
                purse.text(formatGold(currentGold));
                updateGoldHiddenInputs();
                item.quantity++;
                updateHiddenInputs();
                updateInventoryDisplay();
                showToast(`Acheté : ${item.name}.<br>Bourse restante : ${formatGold(currentGold)} PO`);
            } else {
                showToast('Pas assez d\'or dans cette bourse !', 'Erreur');
            }
        });

        inventoryContainer.on('click', '.btn-decrease', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const category = button.data('item-category');
            const item = purchasedItems[category][itemId];
            const purse = purses[category];
            let currentGold = parseFloat(purse.text()) || 0;

            currentGold += item.price;
            purse.text(formatGold(currentGold));
            updateGoldHiddenInputs();

            item.quantity--;
            let itemName = item.name;
            if (item.quantity === 0) {
                delete purchasedItems[category][itemId];
            }

            updateHiddenInputs();
            updateInventoryDisplay();
            showToast(`Vendu : ${itemName}.<br>Bourse restante : ${formatGold(currentGold)} PO`);
        });

        inventoryContainer.on('click', '.btn-remove-stack', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const category = button.data('item-category');
            const item = purchasedItems[category][itemId];
            const purse = purses[category];
            let currentGold = parseFloat(purse.text()) || 0;

            currentGold += item.price * item.quantity;
            purse.text(formatGold(currentGold));
            updateGoldHiddenInputs();
            let itemName = item.name;

            delete purchasedItems[category][itemId];

            updateHiddenInputs();
            updateInventoryDisplay();
            showToast(`Vendu (x${item.quantity}) : ${itemName}.<br>Bourse restante : ${formatGold(currentGold)} PO`);
        });

        // Initial display of purchased items on page load
        updateInventoryDisplay();

        // Hide loading overlay
        $('#loading-overlay').hide();
    };
});