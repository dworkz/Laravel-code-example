<div class="row" id="phone-{{ $number_person_form }}-{{ $phone_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.phone.' . $number_person_form . '.number.' . $phone_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Телефон</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[phone][{{ $number_person_form }}][number][]" value="{{ old('person.phone.' . $number_person_form . '.number.' . $phone_number_form) }}">
                @if($errors->has('person.phone.' . $number_person_form . '.number.' . $phone_number_form))
                    <div class="help-block">{{ $errors->first('person.phone.' . $number_person_form . '.number.' . $phone_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.phone.' . $number_person_form . '.name.' . $phone_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Название</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[phone][{{$number_person_form}}][name][]" value="{{ old('person.phone.' . $number_person_form . '.name.' . $phone_number_form) }}">
                @if($errors->has('person.phone.' . $number_person_form . '.name.' . $phone_number_form))
                    <div class="help-block">{{ $errors->first('person.phone.' . $number_person_form . '.name.' . $phone_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($phone_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="phone-add-{{ $number_person_form }}" data-rows="{{ $phone_number_form_count }}" data-person="{{ $number_person_form }}" href="#phone-line-{{ $number_person_form }}" class="phone-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="phone-{{ $number_person_form }}-{{ $phone_number_form }}" data-person="{{ $number_person_form }}" href="#phone-line-{{ $number_person_form }}" class="phone-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>