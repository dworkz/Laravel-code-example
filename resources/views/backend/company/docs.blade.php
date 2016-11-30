@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Компании <small>документы {{ $company->name }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/company">Компании</a></li>
                    <li>
                        <a class="link-effect" href="/backend/company/view/{{ $company->id }}">
                            {{ $company->name }}
                        </a>
                    </li>
                    <li>Документы</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">


        @include('backend.elements.messages')

        @include('backend.docs.management', [
            'ajax' => TRUE,
            'block_title' => 'Добавить документ',
            'input_name' => $input_name,
            'input_value' => $input_value,
            'folder' => $folder,
        ])

    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop
