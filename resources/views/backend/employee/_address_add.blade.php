<div class="row" id="address-{{ $address_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('address.name.' . $address_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Адрес</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="address[name][]" value="{{ old('address.name.' . $address_number_form) }}">
                @if($errors->has('address.name.' . $address_number_form))
                    <div class="help-block">{{ $errors->first('address.name.' . $address_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('address.description.' . $address_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Описание</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="address[description][]" value="{{ old('address.description.' . $address_number_form) }}">
                @if($errors->has('address.description.' . $address_number_form))
                    <div class="help-block">{{ $errors->first('address.description.' . $address_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($address_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="address-add-{{ $address_number_form }}" data-rows="{{ $address_number_form_count }}" href="#address-line" class="address-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="address-minus-{{ $address_number_form }}" data-number="{{ $address_number_form }}" href="#address-line" class="address-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>















