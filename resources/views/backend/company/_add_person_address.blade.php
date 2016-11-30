<div class="row" id="address-{{ $number_person_form }}-{{ $address_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.address.' . $number_person_form . '.name.' . $address_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Адрес</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[address][{{$number_person_form}}][name][]" value="{{ old('person.address.' . $number_person_form . '.name.' . $address_number_form) }}">
                @if($errors->has('person.address.' . $number_person_form . '.name.' . $address_number_form))
                    <div class="help-block">{{ $errors->first('person.address.' . $number_person_form . '.name.' . $address_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.address.' . $number_person_form . '.description.' . $address_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Описание</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[address][{{ $number_person_form }}][description][]" value="{{ old('person.address.' . $number_person_form . '.description.' . $address_number_form) }}">
                @if($errors->has('person.address.' . $number_person_form . '.description.' . $address_number_form))
                    <div class="help-block">{{ $errors->first('person.address.' . $number_person_form . '.description.' . $address_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>


    <div class="col-sm-2 text-center">


        @if($address_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="address-add-{{ $number_person_form }}" data-rows="{{ $address_number_form_count }}" data-person="{{ $number_person_form }}" href="#address-line-{{ $number_person_form }}" class="address-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="address-{{ $number_person_form }}-{{ $address_number_form }}" data-person="{{ $number_person_form }}" href="#address-line-{{ $number_person_form }}" class="address-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>