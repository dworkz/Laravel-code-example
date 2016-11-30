@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-xs-7">
                <h1 class="page-heading">
                    {{ $title }} <small>список</small>
                </h1>
            </div>

            <div class="col-xs-5 text-right">
                <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                <a href="/backend/employee/add" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
            </div>

            <!--
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Category</li>
                    <li><a class="link-effect" href="">Page</a></li>
                </ol>
            </div>
            -->
        </div>
    </div>
    <!-- END Page Header -->

     <!-- Page Content -->
    <div class="content">

        @include('backend.elements.messages')


    @if(count($employee) > 0)
        <div class="block">
            <div class="block-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Email</th>
                        <th class="hidden-xs text-center">Телефон</th>
                        <th class="text-center" style="width: 150px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($employee AS $emp)

                            <tr>
                                <td>
                                    <a href="/backend/employee/view/{{ $emp->id }}">
                                        {{ $emp->fio }}
                                    </a>
                                </td>
                                <td>
                                    {{ $emp->user->email }}
                                </td>
                                <td class="hidden-xs text-center">
                                    {{ with(new EmployeeHelper)->phone($emp->id) }}
                                </td>
                                <td class="text-right">

                                    @if($emp->user->is_admin < 1)
                                        <a href="/backend/permissions/update/{{ $emp->user->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Права доступа">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                    @endif

                                    <a href="/backend/employee/edit/{{ $emp->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                                    <a href="/backend/employee/destroy/{{ $emp->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop

@section('head_code')

    <style>
        .dropdown-menu {
            font-size: 10px;
        }
    </style>

@stop