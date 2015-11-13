// DOM Ready
(function($, window, undefined) {
  $(function() {

    if ( $('body').hasClass('woocommerce') ) {

      var $currencyCharOrig = $('.price del .amount');
      $currencyCharOrig.html(function(i, html) {
        return html.replace('$', '');
      });

      // Find "$" in .price element and add wrapping <sup>
      var $currencyCharSale = $('.price .amount');
      $currencyCharSale.html(function(i, html) {
        return html.replace('$', '<sup class="currencyChar">$</sup>');
      });


      // Single Product
      if ( $('body').hasClass('single-product') ) {
        // Remove variation labels and <br> tags in variation radio's
        $('.variations').find('.label').remove();
        $('.variations .value').find('br, strong').remove();

        // Make variation option text clickable for the radio input
        $('.variations .value').find('input').each(function() {
          //console.log( index + ": " + $( this ).attr('value') );
          //$(this).find()

          var thisInput = $(this);
          var postInputText = $(this)[0].nextSibling;
          var both = thisInput.add(postInputText);

          $(both).wrapAll('<label></label>');

          $(postInputText).wrap('<span></span>');
        });

        $('.variations input').change(function () {
          if ($(this).prop('checked')) {
            $('.variations input').parent('label').removeClass('checked');
            $(this).parent('label').addClass('checked');
          }
        }).change();


        // Add to Bag button wrap
        $('.single_add_to_cart_button').wrap('<div class="centerBtn"></div>');
      }
    }

    // Find and remove "$" in .price element of original price of sale item


  });

})(jQuery, window);