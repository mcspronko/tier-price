define(['jquery'], function ($) {
  'use strict';

  /**
   * @param {Object.<string>} element
   */
  return function (element) {
    const qtyIdentifier = element.qtyIdentifier;
    const priceIdentifier = element.priceIdentifier;
    const tierPrices = element.tierPrices;

    const priceContainer = $(priceIdentifier);
    const originalPriceHtml = priceContainer.html();

    $(qtyIdentifier).on('change', function (event) {
        const qty = parseInt(event.target.value);

        let isUpdate = false;
        tierPrices.forEach(function (tierPrice) {
          if (tierPrice.qty <= qty) {
            priceContainer.html(tierPrice.price);
            isUpdate = true;
          }
        });

        if (!isUpdate) {
          priceContainer.html(originalPriceHtml);
        }

        isUpdate = true;
    });
  }
});
