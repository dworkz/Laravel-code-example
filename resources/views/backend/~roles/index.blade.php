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
                <a href="/backend/roles/add" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
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


    @if(count($roles) > 0)
        <div class="block">
            <div class="block-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th class="hidden-xs" style="width: 15%;">Slug</th>
                        <th class="text-center" style="width: 100px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($roles AS $role)

                            <tr>
                                <td>{{ $role->role_title }}</td>
                                <td class="hidden-xs">
                                    {{ $role->role_slug }}
                                </td>
                                <td class="text-right">
                                    <a href="/backend/roles/edit/{{ $role->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>

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