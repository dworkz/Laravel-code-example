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
                <a href="/backend/note/add" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
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


        @if(count($notes) > 0)
            <div class="block">
                <div class="block-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('app.note_name')</th>
                            <th>От кого</th>
                            <th>Дата создания</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($notes AS $note)

                            <tr>
                                <td>
                                    <a href="/backend/note/view/{{ $note->id }}">
                                        {{ $note->name }}
                                    </a>
                                </td>
                                <td>{{ with(new NoteHelper)->employee($note->employee_id) }}</td>
                                <td>{{ $note->created_at }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    {{ $notes->render() }}

                </div>
            </div>
        @endif


    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop

