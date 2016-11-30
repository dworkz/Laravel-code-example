<div class="row" id="doc-{{ $number_person_form }}-{{ $doc_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.doc.' . $number_person_form . '.name.' . $doc_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Название</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[doc][{{ $number_person_form }}][name][]" value="{{ old('person.doc.' . $number_person_form . '.name.' . $doc_number_form) }}">
                @if($errors->has('person.doc.' . $number_person_form . '.name.' . $doc_number_form))
                    <div class="help-block">{{ $errors->first('person.doc.' . $number_person_form . '.name.' . $doc_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.doc.' . $number_person_form . '.path_to_doc.' . $doc_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Файл</label>

            <div class="col-sm-12">
                <input class="form-control" type="file" name="person[doc][{{$number_person_form}}][path_to_doc][]" value="{{ old('person.doc.' . $number_person_form . '.path_to_doc.' . $doc_number_form) }}">
                @if($errors->has('person.doc.' . $number_person_form . '.path_to_doc.' . $doc_number_form))
                    <div class="help-block">{{ $errors->first('person.doc.' . $number_person_form . '.path_to_doc.' . $doc_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($doc_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="doc-add-{{ $number_person_form }}" data-rows="{{ $doc_number_form_count }}" data-person="{{ $number_person_form }}" href="#doc-line-{{ $number_person_form }}" class="doc-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="doc-{{ $number_person_form }}-{{ $doc_number_form }}" data-person="{{ $number_person_form }}" href="#doc-line-{{ $number_person_form }}" class="doc-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>