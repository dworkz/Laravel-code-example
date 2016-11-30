@extends('backend.layouts.main')

@section('content')


<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Компании <small>добавление.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/company">Компании</a></li>
                    <li>Добавить</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

     <!-- Page Content -->
    <div class="content">

        <div class="block">

            <div class="block-content block-content-narrow">

                <form enctype="multipart/form-data" class="form-horizontal push-10-t" action="/backend/company/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group<?php if($errors->has('type_id')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material floating">
                                <select class="form-control" name="type_id" size="1">
                                    <option></option>
                                    @foreach($company_type AS $key => $value)
                                        <option value="{{ $key }}"{{ (old('type_id') == $key  ? " selected" : "")  }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="type_id">Выберите тип</label>
                                @if($errors->has('type_id'))
                                    <div class="help-block">{{ $errors->first('type_id') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @include('backend.company._add_form')

                    @if(count(Request::old('person.fio')) > 0)
                        @for ($i = 0; $i < count(Request::old('person.fio')); $i++)
                            @include('backend.company._add_person', [
                                'number_person_form' => $i,
                                'number_person_form_count' => count(Request::old('person.fio'))
                            ])
                        @endfor
                    @else
                        @include('backend.company._add_person', [
                            'number_person_form' => 0,
                            'number_person_form_count' => 0
                        ])
                    @endif

                    <hr id="persons-line" name="persons-line" />


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

@section('footer_js')

    @include('backend.company._js_person')

@stop