@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Права доступа <small>редактирование</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/permissions">Роли</a></li>
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

                <form class="form-horizontal push-10-t" action="/backend/permissions/update/{{ $permission->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group<?php if($errors->has('permission_title')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="permission_title" value="{{ $permission->permission_title }}" placeholder="Введите название">
                                <label for="material-text">Название</label>
                                @if($errors->has('permission_title'))
                                    <div class="help-block">{{ $errors->first('permission_title') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('permission_slug')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="permission_slug" value="{{ $permission->permission_slug }}" placeholder="Введите slug">
                                <label for="material-text">Slug</label>
                                @if($errors->has('permission_slug'))
                                    <div class="help-block">{{ $errors->first('permission_slug') }}</div>
                                @else
                                    <div class="help-block">Название роли набранное латиницей</div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group<?php if($errors->has('permission_description')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">

                                <textarea class="form-control" name="permission_description" rows="3" placeholder="Введите описание">{{ $permission->permission_description }}</textarea>
                                <label for="material-text">Описание</label>
                                @if($errors->has('permission_description'))
                                    <div class="help-block">{{ $errors->first('permission_description') }}</div>
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