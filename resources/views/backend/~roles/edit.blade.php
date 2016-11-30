@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Роли <small>редактирование</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/roles">Роли</a></li>
                    <li>редактирование</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

     <!-- Page Content -->
    <div class="content">

        <div class="block">

            <div class="block-content block-content-narrow">

                <form class="form-horizontal push-10-t" action="/backend/roles/update/{{ $role->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group<?php if($errors->has('role_title')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="role_title" value="{{ $role->role_title }}" placeholder="Введите название роли">
                                <label for="material-text">Название</label>
                                @if($errors->has('role_title'))
                                    <div class="help-block">{{ $errors->first('role_title') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('role_slug')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="role_slug" value="{{ $role->role_slug }}" placeholder="Введите slug">
                                <label for="material-text">Slug</label>
                                @if($errors->has('role_slug'))
                                    <div class="help-block">{{ $errors->first('role_slug') }}</div>
                                @else
                                    <div class="help-block">Название роли набранное латиницей</div>
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