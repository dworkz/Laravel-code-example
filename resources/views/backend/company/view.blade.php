@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Предприятие <small>карточка: {{ $company->name }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <a href="/backend/company/edit/{{ $company->id }}" class="btn btn-success" type="button">
                    Редактировать
                </a>

            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">


        @include('backend.elements.messages')


        <div class="block">
            <div class="block-content">

                <table class="table table-striped">
                    <tbody>

                        @foreach($data_form AS $tr)

                            <tr>
                                <td style="width:100px;">{{ $tr['title'] }}:</td>
                                <td>
                                    <a href="#" id="{{ $tr['input_name'] }}" data-type="{{ $tr['data-type'] }}" data-pk="{{ $tr['id'] }}" data-url="/backend/company/update" data-title="{{ $tr['data-title'] }}">{{ $tr['name'] }}</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                @include('backend.company._persons', ['view' => TRUE])



            </div>
        </div>



    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop

