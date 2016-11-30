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
                <a href="/backend/company/add" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
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


        @if(count($company) > 0)
            <div class="block">
                <div class="block-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th class="hidden-xs" style="width: 15%;">Тип</th>
                            <th class="text-center" style="width: 150px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($company AS $com)

                            <tr>
                                <td>
                                    <a href="/backend/company/view/{{ $com->id }}">
                                        {{ $com->name }}
                                    </a>
                                </td>
                                <td class="hidden-xs">
                                    @if(isset($company_type[$com->type_id]))
                                        {{ $company_type[$com->type_id] }}
                                    @endif
                                </td>
                                <td class="text-right">
<!--
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button">
                                            <i class="si si-settings"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/backend/company/view/{{ $com->id }}">
                                                        Карточка предприятия
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/backend/company/phones/{{ $com->id }}">
                                                        Телефоны
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/backend/company/email/{{ $com->id }}">
                                                        Почта
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/backend/company/address/{{ $com->id }}">
                                                        Адреса
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/backend/company/docs/{{ $com->id }}">
                                                        Документы
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
-->

                                    <a href="/backend/company/edit/{{ $com->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/company/destroy/{{ $com->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
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