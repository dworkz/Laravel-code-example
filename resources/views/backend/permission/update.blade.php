@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Права доступа "{{ $employee->fio }}" <small>Обновление.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Обновить</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

     <!-- Page Content -->
    <div class="content">

        @include('backend.elements.messages')

        <div class="block">

            <div class="block-content block-content-narrow">

                <form class="form-horizontal push-10-t" action="/backend/permissions/update/{{ $user->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Просмотр</th>
                            <th class="text-center">Добавление</th>
                            <th class="text-center">Редактирование</th>
                            <th class="text-center">Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions AS $value => $name)

                                <tr>
                                    <td>{{ $name }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="{{$value}}[view]" value="1"<?php if(isset($user_access[$value]['view'])) { ?> checked<?php } ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="{{$value}}[add]" value="1"<?php if(isset($user_access[$value]['add'])) { ?> checked<?php } ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="{{$value}}[edit]" value="1"<?php if(isset($user_access[$value]['edit'])) { ?> checked<?php } ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="{{$value}}[delete]" value="1"<?php if(isset($user_access[$value]['delete'])) { ?> checked<?php } ?>>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>


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