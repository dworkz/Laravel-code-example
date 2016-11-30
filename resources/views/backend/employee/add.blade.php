@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Сотрудники <small>добавление.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/employee">Сотрудники</a></li>
                    <li>Добавить</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

     <!-- Page Content -->
    <div class="content">

        <div class="block">

            <div class="block-content block-content-narrow">

                <form class="form-horizontal push-10-t" action="/backend/employee/store" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group<?php if($errors->has('fio')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="fio" value="{{ old('fio') }}" placeholder="Введите ФИО">
                                <label for="material-text">ФИО</label>
                                @if($errors->has('fio'))
                                    <div class="help-block">{{ $errors->first('fio') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('main_email')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="main_email" value="{{ old('main_email') }}" placeholder="Введите email">
                                <label for="material-text">Основной email</label>
                                @if($errors->has('main_email'))
                                    <div class="help-block">{{ $errors->first('main_email') }}</div>
                                @endif
                                <div class="help-block">Используется для входа на сайт и отправки напоминаний с сайта.</div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('position')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="position" value="{{ old('role_slug') }}" placeholder="Введите должность">
                                <label for="material-text">Должность</label>
                                @if($errors->has('position'))
                                    <div class="help-block">{{ $errors->first('position') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('inn')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="inn" value="{{ old('inn') }}" placeholder="Введите ИНН">
                                <label for="material-text">ИНН</label>
                                @if($errors->has('inn'))
                                    <div class="help-block">{{ $errors->first('inn') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('note')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">

                                <textarea class="form-control" name="note" rows="3" placeholder="Введите примечание"></textarea>
                                <label for="material-text">Примечание</label>
                                @if($errors->has('note'))
                                    <div class="help-block">{{ $errors->first('note') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('positive')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">

                                <textarea class="form-control" name="positive" rows="3" placeholder="Введите позитив"></textarea>
                                <label for="material-text">Позитив</label>
                                @if($errors->has('positive'))
                                    <div class="help-block">{{ $errors->first('positive') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('negative')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">

                                <textarea class="form-control" name="negative" rows="3" placeholder="Введите негатив"></textarea>
                                <label for="material-text">Негатив</label>
                                @if($errors->has('negative'))
                                    <div class="help-block">{{ $errors->first('negative') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(count(Request::old('phone.number')) > 0)
                        @for ($i = 0; $i < count(Request::old('phone.number')); $i++)
                            @include('backend.employee._phone_add', [
                                'phone_number_form' => $i,
                                'phone_number_form_count' => count(Request::old('phone.number'))
                            ])
                        @endfor
                    @else
                        @include('backend.employee._phone_add', [
                            'phone_number_form' => 0,
                            'phone_number_form_count' => 0
                        ])
                    @endif



                    <hr id="phone-blocks" name="phone-blocks" />

                    @if(count(Request::old('email.email')) > 0)
                        @for ($i = 0; $i < count(Request::old('email.email')); $i++)
                            @include('backend.employee._email_add', [
                                'email_number_form' => $i,
                                'email_number_form_count' => count(Request::old('email.email'))
                            ])
                        @endfor
                    @else
                        @include('backend.employee._email_add', [
                            'email_number_form' => 0,
                            'email_number_form_count' => 0
                        ])
                    @endif

                    <hr id="email-blocks" name="email-blocks" />

                    @if(count(Request::old('address.name')) > 0)
                        @for ($i = 0; $i < count(Request::old('address.name')); $i++)
                            @include('backend.employee._address_add', [
                                'address_number_form' => $i,
                                'address_number_form_count' => count(Request::old('address.name'))
                            ])
                        @endfor
                    @else
                        @include('backend.employee._address_add', [
                            'address_number_form' => 0,
                            'address_number_form_count' => 0
                        ])
                    @endif

                    <hr id="address-blocks" name="address-blocks" />

                    @if(count(Request::old('doc.name')) > 0)
                        @for ($i = 0; $i < count(Request::old('doc.name')); $i++)
                            @include('backend.employee._doc_add', [
                                'doc_number_form' => $i,
                                'doc_number_form_count' => count(Request::old('doc.name'))
                            ])
                        @endfor
                    @else
                        @include('backend.employee._doc_add', [
                            'doc_number_form' => 0,
                            'doc_number_form_count' => 0
                        ])
                    @endif

                    <hr id="doc-blocks" name="doc-blocks" />

                    <div class="form-group">
                        <div class="col-sm-9">
                            <button class="btn btn-sm btn-primary" type="submit">Сохранить</button>
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

@section('footer_js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '<?php echo csrf_token(); ?>'
                }
            });

            $('.phone-add').on('click', function() {

                var number = $(this).data('rows');
                $(this).data('rows', number + 1);

                $.ajax({
                    cache: false,
                    type: 'POST',
                    data: {'number': number + 1,},
                    url: '/backend/employee/phone-add',
                    success: function(data) {
                        $('#phone-blocks').before(data.html)
                    }
                });
            });

            $(document).on('click', '.phone-minus', function() {
                var number = $(this).data('number');
                $('#phone-add-' + number).data('rows', number - 1);
                $('#phone-' + number + '-block').remove();
            });

            $('.email-add').on('click', function() {
                var number = $(this).data('rows');
                $(this).data('rows', number + 1);
                $.ajax({
                    cache: false,
                    type: 'POST',
                    data: {'number': number + 1,},
                    url: '/backend/employee/email-add',
                    success: function(data) {
                        $('#email-blocks').before(data.html)
                    }
                });
            });

            $(document).on('click', '.email-minus', function() {
                var number = $(this).data('number');
                $('#email-add-' + number).data('rows', number - 1);
                $('#email-' + number + '-block').remove();
            });

            $('.address-add').on('click', function() {
                var number = $(this).data('rows');
                $(this).data('rows', number + 1);
                $.ajax({
                    cache: false,
                    type: 'POST',
                    data: {'number': number + 1,},
                    url: '/backend/employee/address-add',
                    success: function(data) {
                        $('#address-blocks').before(data.html)
                    }
                });
            });

            $(document).on('click', '.address-minus', function() {
                var number = $(this).data('number');
                $('#address-add-' + number).data('rows', number - 1);
                $('#address-' + number + '-block').remove();
            });

            $('.doc-add').on('click', function() {
                var number = $(this).data('rows');
                $(this).data('rows', number + 1);
                $.ajax({
                    cache: false,
                    type: 'POST',
                    data: {'number': number + 1,},
                    url: '/backend/employee/doc-add',
                    success: function(data) {
                        $('#doc-blocks').before(data.html)
                    }
                });
            });

            $(document).on('click', '.doc-minus', function() {
                var number = $(this).data('number');
                $('#doc-add-' + number).data('rows', number - 1);
                $('#doc-' + number + '-block').remove();
            });

        });
    </script>
@stop