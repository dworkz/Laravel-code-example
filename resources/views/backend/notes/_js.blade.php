<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': '<?php echo csrf_token(); ?>'
        }
    });

    $(document).ready(function() {

        $('#product-add').on('click', function() {

            var number_form = $(this).data('rows');
            $(this).data('rows', number_form + 1);

            $.ajax({
                cache: false,
                type: 'POST',
                data: {'number_form': number_form + 1},
                url: '/backend/note/product-add',
                success: function(data) {
                    $('#products-line').before(data.html)
                }
            });
        });

        $('#doc-add').on('click', function() {

            var number_form = $(this).data('rows');
            $(this).data('rows', number_form + 1);

            $.ajax({
                cache: false,
                type: 'POST',
                data: {'number_form': number_form + 1},
                url: '/backend/note/doc-add',
                success: function(data) {
                    $('#docs-line').before(data.html)
                }
            });

        });

    });

    $(document).on('click', '.product-minus', function() {
        var number_form = $('#product-add').data('rows');
        $('#product-add').data('rows', number_form - 1);

        $('#' + this.id + '-block').remove();
    });

    $(document).on('click', '.doc-minus', function() {
        var number_form = $('#doc-add').data('rows');
        $('#product-add').data('rows', number_form - 1);
        $('#' + this.id + '-block').remove();
    });

    $(document).on('keyup', '.qty', function() {
        var qty = $('#' + this.id).val().replace(",",".");
        $('#' + this.id).val(qty);
        var row = $('#'+this.id).data('row');
        var price = $('#price-' + row).val().replace(",",".");

        if(qty > 0 && price != undefined && price > 0)
        {
            var sum = qty.replace(",",".") * price;
            $('#sum-' + row).val(sum.toFixed(2));
        }
    });

    $(document).on('keyup', '.price', function() {
        var price = $('#' + this.id).val().replace(",",".");
        $('#' + this.id).val(price);
        var row = $('#'+this.id).data('row');
        var qty = $('#qty-' + row).val().replace(",",".");

        if(price > 0 && qty != undefined && qty > 0)
        {
            var sum = qty * price;
            $('#sum-' + row).val(sum.toFixed(2));
        }
    });

</script>