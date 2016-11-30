@extends('backend.layouts.main')

@section('content')


        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Служебная записка
                </h1>
            </div>

            <div class="col-xs-5 text-right">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/note/new">Служебные записки</a></li>
                    <li>{{ $main_note->name }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content content-boxed -->
    <div class="content">


        @include('backend.elements.messages')


        @include('backend.notes._item', ['item' => $main_note, 'docs' => $nDocs, 'products' => $nProducts, 'parent_id' => $main_note->id])


        @if(count($notes) > 0)

            @foreach($notes AS $n)

                @include('backend.notes._item', [
                    'item' => $n,
                    'docs' => with(new NoteHelper)->docs($n->id),
                    'products' => with(new NoteHelper)->products($n->id),
                    'parent_id' => $main_note->id,
                ])

            @endforeach

        @endif


    </div>
    <!-- END Page Content -->


</main>
<!-- END Main Container -->

@stop