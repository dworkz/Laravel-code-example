@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Сотрудники <small>карточка: {{ $employee->fio }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/employee">Сотрудники</a></li>
                    <li>{{ $employee->fio }}</li>
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
                    <tr>
                        <td style="width:100px;">ФИО:</td>
                        <td>
                            <a href="#" id="fio" class="update" data-type="text" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите ФИО">
                                {{ $employee->fio }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Основной email:</td>
                        <td>
                            <a href="#" id="main_email" class="update" data-type="text" data-pk="{{ $employee->user->id }}" data-url="/backend/employee/update-main-email" data-title="Введите основной email">
                                {{ $employee->user->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Должность:</td>
                        <td>
                            <a href="#" id="position" class="update" data-type="text" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите должность">
                                {{ $employee->position }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>ИНН:</td>
                        <td>
                            <a href="#" id="inn" class="update" data-type="text" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите ИНН">
                                {{ $employee->inn }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Примечание:</td>
                        <td>
                            <a href="#" id="note" class="update" data-type="textarea" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите примечание">{{ $employee->note }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Позитив:</td>
                        <td>
                            <a href="#" id="positive" class="update" data-type="textarea" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите позитивные качества">{{ $employee->positive }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Негатив:</td>
                        <td>
                            <a href="#" id="negative" class="update" data-type="textarea" data-pk="{{ $employee->id }}" data-url="/backend/employee/update" data-title="Введите негативные качества">{{ $employee->negative }}</a>
                        </td>
                    </tr>
                    </tbody>
                </table>


                @include('backend.employee._phone_list_edit')

                @include('backend.employee._email_list_edit')

                @include('backend.employee._address_list_edit')

                @include('backend.employee._docs_list_edit')


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

            $('.update').editable({
                success: function(response, newValue){if(response.status == 'error') {return response.msg;}}
            });

        });
    </script>
@stop
