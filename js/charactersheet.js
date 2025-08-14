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
    if ($('#table-armes').length) {
        
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
            armes: [],
            protections: [],
            materiel: []
        };

        function updateHiddenInputs() {
            for (const category in purchasedItems) {
                hiddenInputs[category].val(purchasedItems[category].join(','));
            }
        }

        function updateInventoryDisplay() {
            inventoryContainer.empty();
            let hasItems = false;

            for (const category in purchasedItems) {
                if (purchasedItems[category].length > 0) {
                    hasItems = true;
                    const categoryTitle = $('<h5>').text(category.charAt(0).toUpperCase() + category.slice(1));
                    inventoryContainer.append(categoryTitle);
                    const list = $('<ul class="list-unstyled">');
                    purchasedItems[category].forEach(itemId => {
                        const shopRow = $(`#item-${category}-${itemId}`);
                        const buyButton = shopRow.find('.btn-buy');
                        const itemName = shopRow.find('td:first').clone().children().remove().end().text();
                        const itemPrice = buyButton.data('item-price');

                        const listItem = $('<li>', {
                            'class': 'd-flex justify-content-between align-items-center mb-1',
                            'html': `<span>${itemName}</span>`
                        });

                        const sellButton = $('<button>', {
                            'type': 'button',
                            'class': 'btn btn-sm btn-warning btn-sell',
                            'data-item-id': itemId,
                            'data-item-price': itemPrice,
                            'data-item-category': category,
                            'text': 'Vendre'
                        });

                        listItem.append(sellButton);
                        list.append(listItem);
                    });
                    inventoryContainer.append(list);
                }
            }

            if (!hasItems) {
                inventoryContainer.html(initialInventoryMessage);
            }
        }

        // Buy event
        $('.input__container').on('click', '.btn-buy', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const price = parseInt(button.data('item-price'));
            const category = button.data('item-category');
            
            const purse = purses[category];
            let currentGold = parseInt(purse.text());

            if (currentGold >= price) {
                currentGold -= price;
                purse.text(currentGold);

                purchasedItems[category].push(itemId);
                
                button.closest('tr').hide();
                updateHiddenInputs();
                updateInventoryDisplay();
            } else {
                alert('Pas assez d\'or dans cette bourse !');
            }
        });

        // Sell event
        inventoryContainer.on('click', '.btn-sell', function() {
            const button = $(this);
            const itemId = button.data('item-id');
            const price = parseInt(button.data('item-price'));
            const category = button.data('item-category');

            const purse = purses[category];
            let currentGold = parseInt(purse.text());

            currentGold += price;
            purse.text(currentGold);

            purchasedItems[category] = purchasedItems[category].filter(id => id != itemId);

            $(`#item-${category}-${itemId}`).show();
            updateHiddenInputs();
            updateInventoryDisplay();
        });
    }
});