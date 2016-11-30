
<div class="col-sm-12" id="doc-{{ $number_form }}-block">


    <div class="row">
        <div class="col-sm-4">

            <div class="form-group<?php if($errors->has('docs.name.' . $number_form)): ?> has-error<?php endif; ?>">
                @if($number_form === 0)
                    <label class="col-xs-12">Название документа</label>
                @endif
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="docs[name][]" value="{{ old('docs.name.' . $number_form) }}">
                    @if($errors->has('docs.name.' . $number_form))
                        <div class="help-block">{{ $errors->first('docs.name.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>


        <div class="col-sm-4">

            <div class="form-group<?php if($errors->has('docs.description.' . $number_form)): ?> has-error<?php endif; ?>">
                @if($number_form === 0)
                    <label class="col-xs-12">Описание</label>
                @endif
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="docs[description][]" value="{{ old('docs.description.' . $number_form) }}">
                    @if($errors->has('docs.description.' . $number_form))
                        <div class="help-block">{{ $errors->first('docs.description.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="form-group<?php if($errors->has('docs.path_to_doc.' . $number_form)): ?> has-error<?php endif; ?>">
                <label class="col-xs-12" for="document">Выберите файл</label>
                <div class="col-xs-12">
                    <input type="file" id="document" name="docs[path_to_doc][]">
                    @if($errors->has('docs.path_to_doc.' . $number_form))
                        <div class="help-block">{{ $errors->first('docs.path_to_doc.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>


        <div class="col-sm-1">


            @if($number_form === 0)

                <div class="form-group">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <div class="col-sm-12">
                        <a id="doc-add" data-rows="{{ $number_form_count }}" href="#docs-line" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <div class="col-sm-12">
                        <a id="doc-{{ $number_form }}" href="#" class="doc-minus btn btn-warning" type="button"><i class="fa fa-minus"></i></a>
                    </div>
                </div>

            @endif

        </div>

    </div>


</div>