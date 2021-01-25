// Ajax script for admin page

(function ($) {
    const product_flash_sale = $('input.product_flash-sale[type=checkbox]');

    product_flash_sale.bind('change', function () {
        const $product_id = $(this).data('product');
        const $nonce = $(this).data('nonce');
        var $value = '';

        if ($(this).prop("checked")) {
            $value = $(this).val();
        }

        $.ajax({
            type: "POST",
            url: ajax_object,
            data: {
                action: "update_product_flash_sale",
                product_id: $product_id,
                value: $value,
                nonce: $nonce
            },
            success: function (response) {
                // console.log(response);
            }
        });
    });
})(jQuery);