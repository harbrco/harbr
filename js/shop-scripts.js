// DOM Ready
(function($, window, undefined) {
  $(function() {

    if ( $('body').hasClass('woocommerce-page') ) {

      var $currencyCharOrig = $('.price del .amount');
      $currencyCharOrig.html(function(i, html) {
        return html.replace('$', '');
      });

      // Find "$" in .price element and add wrapping <sup>
      var $currencyCharSale = $('.price .amount');
      $currencyCharSale.html(function(i, html) {
        return html.replace('$', '<sup class="currencyChar">$</sup>');
      });

      // Remove decimal and "cents" from price
      $('.price .amount').each(function() {
        var el = $(this);
        var roundAmount = el.text().split('.')[0];

        el.text(roundAmount);
      });


      // Single Product
      if ( $('body').hasClass('single-product') ) {
        // Product Gallery Thumb - give the first item active class
        $('.product-image-page-link').first().addClass('active');


        // Remove variation labels and <br> tags in variation radio's
        $('.variations').find('.label').remove();
        $('.variations .value').find('br, strong').remove();

        // Make variation option text clickable for the radio input
        $('.variations .value').find('input').each(function() {
          var thisInput = $(this);
          var postInputText = $(this)[0].nextSibling;
          var both = thisInput.add(postInputText);

          $(both).wrapAll('<label></label>');

          $(postInputText).wrap('<span></span>');
        });

        $('.variations tr').each(function() {
          var $tr = $(this);
          var $inputs = $tr.find('input');
          $inputs.change(function () {
            if ($(this).prop('checked')) {
              $inputs.parent('label').removeClass('checked');
              $(this).parent('label').addClass('checked');
            }
          }).change();
        });

        // Add to Bag button wrap
        $('.single_add_to_cart_button').wrap('<div class="centerBtn"></div>');

        setTimeout(function(){
          $('form.variations_form .variations input:radio').change();
        }, 200);

        // Variations add to cart button fade
        var $varLabel = $('.variations label');

        var stockCheck = function() {
          var $varStock = $('.single_variation .stock');
          var $varBtn = $('.variations_button');

          if ( $varStock.hasClass('out-of-stock') ) {
            $varBtn.addClass('disabled');
          } else {
            $varBtn.removeClass('disabled');
          }
        };

        setTimeout(function(){
          stockCheck();
        }, 200);

        $varLabel.on('click', function () {
          setTimeout(function(){
            stockCheck();
          }, 200);
        });



        // Single Product Add to bag modal
        if (!$('.variations_form').length) {
          $('.single_add_to_cart_button').closest('form').hide();
          $('.add_to_cart_button').text('Add to Bag');
        }

        $(document).on('added_to_cart', function() {
          console.log("I'm going to be a modal, someday");
        });

      }


      // Cart Page
      if ( $('body').hasClass('cart') ) {
        $('.coupon label').after('<p>Enter any valid coupon or promo code here to redeem your discount.</p>');

        // Wrap coupon button with span for proper button styling
        $('.coupon .button').wrap('<span class="span-after"></span>');
      }


      // Checkout Page
      if ( $('body').hasClass('checkout') ) {
        // Wrap coupon button with span for proper button styling (after any ajax event ends)
        $(document).ajaxStart(function() {
          $('.place-order input.button').unwrap();
        });
        $(document).ajaxComplete(function() {
          $('.place-order input.button').wrap('<span class="span-after"></span>');
        });

      }

    }


  });

})(jQuery, window);