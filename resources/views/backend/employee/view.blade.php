@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Сотрудники <small>карточка: {{ $employee->fio }}.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <a href="/backend/employee/edit/{{ $employee->id }}" class="btn btn-success" type="button">
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
                    <tr>
                        <td style="width:100px;">ФИО:</td>
                        <td>
                            {{ $employee->fio }}
                        </td>
                    </tr>
                    <tr>
                        <td>Должность:</td>
                        <td>

                            {{ $employee->position }}

                        </td>
                    </tr>
                    <tr>
                        <td>ИНН:</td>
                        <td>
                            {{ $employee->inn }}
                        </td>
                    </tr>
                    <tr>
                        <td>Примечание:</td>
                        <td>
                            {{ $employee->note }}
                        </td>
                    </tr>
                    <tr>
                        <td>Позитив:</td>
                        <td>
                            {{ $employee->positive }}
                        </td>
                    </tr>
                    <tr>
                        <td>Негатив:</td>
                        <td>
                            {{ $employee->negative }}
                        </td>
                    </tr>
                    </tbody>
                </table>


                @include('backend.employee._phone_list')

                @include('backend.employee._email_list')

                @include('backend.employee._address_list')

                @include('backend.employee._docs_list')


            </div>
        </div>



    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop
