<div class="row" id="doc-{{ $doc_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('doc.name.' . $doc_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Название</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="doc[name][]" value="{{ old('doc.name.' . $doc_number_form) }}">
                @if($errors->has('doc.name.' . $doc_number_form))
                    <div class="help-block">{{ $errors->first('doc.name.' . $doc_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('doc.path_to_doc.' . $doc_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Документ</label>

            <div class="col-sm-12">
                <input class="form-control" type="file" name="doc[path_to_doc][]" value="{{ old('doc.path_to_doc.' . $doc_number_form) }}">
                @if($errors->has('doc.path_to_doc.' . $doc_number_form))
                    <div class="help-block">{{ $errors->first('doc.path_to_doc.' . $doc_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($doc_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="doc-add-{{ $doc_number_form }}" data-rows="{{ $doc_number_form_count }}" href="#doc-line" class="doc-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="doc-minus-{{ $doc_number_form }}" data-number="{{ $doc_number_form }}" href="#doc-line" class="doc-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>















