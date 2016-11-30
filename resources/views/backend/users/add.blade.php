@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Пользователи <small>добавление.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/users/roles">Пользователи</a></li>
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

                <form class="form-horizontal push-10-t" action="/backend/users/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group<?php if($errors->has('name')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Введите ФИО">
                                <label for="material-text">ФИО</label>
                                @if($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('email')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Введите email">
                                <label for="material-text">Email</label>
                                @if($errors->has('email'))
                                    <div class="help-block">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

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