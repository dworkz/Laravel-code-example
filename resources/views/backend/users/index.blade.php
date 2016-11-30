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
                <a href="/backend/users/add" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
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


    @if(count($users) > 0)
        <div class="block">
            <div class="block-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="hidden-xs">ФИО</th>
                        <th>Email</th>
                        <th class="text-center">Активен?</th>
                        <th class="text-center" style="width: 100px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($users AS $user)

                            <tr>
                                <td class="hidden-xs">{{ $user->name }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td class="text-center">
                                    <a href="/backend/users/active/{{ $user->id }}">
                                        @if($user->is_active > 0)
                                            <i class="si si-check text-success"></i>
                                        @else
                                            <i class="si si-close text-danger"></i>
                                        @endif
                                    </a>
                                </td>
                                <td class="text-right">
                                    <a href="/backend/users/edit/{{ $user->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                                    <a href="/backend/users/destroy/{{ $user->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
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