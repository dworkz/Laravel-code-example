@extends('backend.layouts.main')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Служебные записки <small>обновление.</small>
                </h1>
            </div>

            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="/backend/note/new">Служебные записки</a></li>
                    <li>изменить</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">

        <div class="block">

            <div class="block-content block-content-narrow">

                <form class="form-horizontal push-10-t" action="/backend/note/update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="parent_id" value="{{ $parent_id }}" />
                    <input type="hidden" name="employee_id" value="{{ Auth::user()->employee_id }}" />

                    <div class="form-group<?php if($errors->has('name')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">
                                <input class="form-control" type="text" name="name" value="{{ $note->name }}" placeholder="@lang('app.note_name_enter')">
                                <label for="material-text">@lang('app.note_name')</label>
                                @if($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group<?php if($errors->has('description')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material">

                                <textarea class="form-control" name="description" rows="3" placeholder="Описание">{{ $note->description }}</textarea>
                                <label for="material-text">Описание</label>
                                @if($errors->has('description'))
                                    <div class="help-block">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(count(Request::old('product.name')) > 0 OR count($products) > 0)
                        <?php
                            $k = 0;
                        ?>
                        @if(!$errors->has())
                            <?php $count_products = count($products); ?>
                            @foreach ($products AS $product)
                                @include('backend.notes._products_form', [
                                    'number_form' => $k,
                                    'number_form_count' => $count_products,
                                    'product' => $product,
                                ])

                                <?php $k++; ?>
                            @endforeach
                        @endif

                        @for ($i = $k; $i < (count(Request::old('product.name')) + $k); $i++)
                            @include('backend.notes._products_form', [
                                'number_form' => $i,
                                'number_form_count' => count(Request::old('product.name')
                            )])
                        @endfor

                    @else
                        @include('backend.notes._products_form', ['number_form' => 0, 'number_form_count' => 0])
                    @endif

                    <hr id="products-line" name="products-line" />

                    <div class="form-group<?php if($errors->has('company_id')): ?> has-error<?php endif; ?>">
                        <div class="col-sm-9">
                            <div class="form-material floating">
                                <select class="form-control" name="company_id" size="1">
                                    <option></option>
                                    @foreach($companies AS $company)
                                        <option value="{{ $company->id }}">
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="company_id">Выберите компанию</label>
                                @if($errors->has('company_id'))
                                    <div class="help-block">{{ $errors->first('company_id') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>


                    @if(count(Request::old('docs.name')) > 0)
                        @for ($i = 0; $i < count(Request::old('docs.name')); $i++)
                            @include('backend.docs._form_add', [
                                'number_form' => $i,
                                'number_form_count' => count(Request::old('docs.name')
                            )])
                        @endfor
                    @else
                        @include('backend.docs._form_add', ['number_form' => 0, 'number_form_count' => 0])
                    @endif

                    <hr id="docs-line" name="docs-line" />

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

    @include('backend.notes._js')

@stop