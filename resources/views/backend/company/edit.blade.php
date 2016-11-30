@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Предприятие <small>карточка: {{ $company->name }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/company">Компании</a></li>
                    <li>{{ $company->name }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">


        @include('backend.elements.messages')


        <div class="block">
            <div class="block-content">

                <table class="table table-striped">
                    <tbody>

                        @foreach($data_form AS $tr)

                            <tr>
                                <td style="width:100px;">{{ $tr['title'] }}:</td>
                                <td>
                                    <a href="#" id="{{ $tr['input_name'] }}" data-type="{{ $tr['data-type'] }}" data-pk="{{ $tr['id'] }}" data-url="/backend/company/update" data-title="{{ $tr['data-title'] }}">{{ $tr['name'] }}</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @include('backend.company._persons', ['view' => FALSE])



            </div>
        </div>



    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop

@section('head_code')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('footer_js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '<?php echo csrf_token() ?>'
            }
        });

        $(document).ready(function() {
            //toggle `popup` / `inline` mode

            $.fn.editable.defaults.mode = 'inline';
            $('#name').editable({
                success: function(response, newValue)
                {
                    if(response.status == 'error')
                    {
                        return response.msg;
                    }
                }
            });

            $('#short_name').editable();
            $('#description').editable();
            $('#inn').editable();
            $('#kpp').editable();
            $('#ogrn').editable();
            $('#reestr_number').editable();
            $('#okpo').editable();
            $('#okved').editable();
            $('#additional_info').editable();
            $('#bank_details').editable();
            $('#site').editable();
            $('#type_id').editable({
                source: {!! $type_source !!},
                value: {{ $company->type_id }}
            });

            $('.person').editable({
                success: function(response, newValue)
                {
                    if(response.status == 'error')
                    {
                        return response.msg;
                    }
                }
            });

            $('.phone').editable({
                success: function(response, newValue){if(response.status == 'error') {return response.msg;}}
            });

            $('.email').editable({
                success: function(response, newValue){if(response.status == 'error') {return response.msg;}}
            });

            $('.address').editable({
                success: function(response, newValue){if(response.status == 'error') {return response.msg;}}
            });

            $('.doc').editable({
                success: function(response, newValue){if(response.status == 'error') {return response.msg;}}
            });


            /* add person */

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

            /* add person end */

        });
    </script>
@stop
