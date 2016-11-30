<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': '<?php echo csrf_token(); ?>'
        }
    });

    $('#person-add').on('click', function() {

        var number_person_form = $(this).data('rows');
        $(this).data('rows', number_person_form + 1);

        $.ajax({
            cache: false,
            type: 'POST',
            data: {'number_person_form': number_person_form + 1},
            url: '/backend/company/person-add',
            success: function(data) {
                $('#persons-line').before(data.html)
            }
        });
    });

    $(document).on('click', '.person-minus', function() {
        var number_form = $('#person-add').data('rows');
        $('#person-add').data('rows', number_form - 1);

        $('#' + this.id + '-block').remove();
    });

    $(document).on('click', '.phone-add', function() {

        var person = $(this).data('person');
        var number = $(this).data('rows');
        $(this).data('rows', number + 1);

        $.ajax({
            cache: false,
            type: 'POST',
            data: {'number': number + 1, 'person': person},
            url: '/backend/company/person-phone-add',
            success: function(data) {
                $('#phone-line-' + person).before(data.html)
            }
        });
    });

    $(document).on('click', '.phone-minus', function() {

        var person = $(this).data('person');
        var number_form = $('#phone-add-' + person).data('rows');
        $('#phone-add-' + person).data('rows', number_form - 1);

        $('#phone-' + person + '-' + number_form + '-block').remove();

    });

    $(document).on('click', '.email-add', function() {

        var person = $(this).data('person');
        var number = $(this).data('rows');
        $(this).data('rows', number + 1);

        $.ajax({
            cache: false,
            type: 'POST',
            data: {'number': number + 1, 'person': person},
            url: '/backend/company/person-email-add',
            success: function(data) {
                $('#email-line-' + person).before(data.html)
            }
        });
    });

    $(document).on('click', '.email-minus', function() {

        var person = $(this).data('person');
        var number_form = $('#email-add-' + person).data('rows');
        $('#email-add-' + person).data('rows', number_form - 1);

        $('#email-' + person + '-' + number_form + '-block').remove();

    });

    $(document).on('click', '.address-add', function() {

        var person = $(this).data('person');
        var number = $(this).data('rows');
        $(this).data('rows', number + 1);

        $.ajax({
            cache: false,
            type: 'POST',
            data: {'number': number + 1, 'person': person},
            url: '/backend/company/person-address-add',
            success: function(data) {
                $('#address-line-' + person).before(data.html)
            }
        });
    });

    $(document).on('click', '.address-minus', function() {

        var person = $(this).data('person');
        var number_form = $('#address-add-' + person).data('rows');
        $('#address-add-' + person).data('rows', number_form - 1);

        $('#address-' + person + '-' + number_form + '-block').remove();

    });

    $(document).on('click', '.doc-add', function() {

        var person = $(this).data('person');
        var number = $(this).data('rows');
        $(this).data('rows', number + 1);

        $.ajax({
            cache: false,
            type: 'POST',
            data: {'number': number + 1, 'person': person},
            url: '/backend/company/person-doc-add',
            success: function(data) {
                $('#doc-line-' + person).before(data.html)
            }
        });
    });

    $(document).on('click', '.doc-minus', function() {

        var person = $(this).data('person');
        var number_form = $('#doc-add-' + person).data('rows');
        $('#doc-add-' + person).data('rows', number_form - 1);

        $('#doc-' + person + '-' + number_form + '-block').remove();

    });

</script>