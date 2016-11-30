@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Сотрудники <small>телефоны {{ $employee->fio }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/employee">Сотрудники</a></li>
                    <li>
                        <a class="link-effect" href="/backend/employee/view/{{ $employee->id }}">
                            {{ $employee->fio }}
                        </a>
                    </li>
                    <li>Телефоны</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">


        @include('backend.elements.messages')

        @if(count($phones) > 0)
            <div class="block">
                <div class="block-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Телефон</th>
                            <th class="hidden-xs">Описание</th>
                            <th class="text-center">Основной?</th>
                            <th class="text-center" style="width: 100px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($phones AS $phone)

                            <tr>
                                <td>
                                    <a href="#" id="phone" class="phone" data-type="text" data-pk="{{ $phone->id }}" data-url="/backend/employee/update-phone" data-title="Введите телефон">
                                        {{ $phone->phone }}
                                    </a>
                                </td>
                                <td class="hidden-xs">
                                    <a href="#" id="description" class="description" data-type="text" data-pk="{{ $phone->id }}" data-url="/backend/employee/update-phone" data-title="Введите описание">
                                        {{ $phone->description }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/backend/employee/phone-main/{{ $phone->id }}">
                                        @if($phone->is_main > 0)
                                            <i class="si si-check text-success"></i>
                                        @else
                                            <i class="si si-close text-danger"></i>
                                        @endif
                                    </a>
                                </td>
                                <td class="text-right">

                                    <?php
                                    /*
                                        <a href="/backend/employee/phone-edit/{{ $phone->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                                     */
                                    ?>

                                    <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/employee/phone-destroy/{{ $phone->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="block">
            <div class="block-content">

                <form class="form-horizontal push-10-t" action="/backend/employee/phone-store/{{ $employee->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    @include('backend.employee._phone', ['ajax' => TRUE, 'block_title' => 'Добавить телефон'])

                    <input type="hidden" name="employee_id" value="{{ $employee->id }}" />

                    <div class="form-group">
                        <div class="col-sm-9">
                            <button class="btn btn-sm btn-default" type="submit">Сохранить</button>
                        </div>
                    </div>
                </form>

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
            $('.phone').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
            $('.description').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
        });
    </script>
@stop
