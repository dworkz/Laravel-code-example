<div class="row" id="phone-{{ $phone_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('phone.number.' . $phone_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Телефон</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="phone[number][]" value="{{ old('phone.number.' . $phone_number_form) }}">
                @if($errors->has('phone.number.' . $phone_number_form))
                    <div class="help-block">{{ $errors->first('phone.number.' . $phone_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('phone.name.' . $phone_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Название</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="phone[name][]" value="{{ old('phone.name.' . $phone_number_form) }}">
                @if($errors->has('phone.name.' . $phone_number_form))
                    <div class="help-block">{{ $errors->first('phone.name.' . $phone_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($phone_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="phone-add-{{ $phone_number_form }}" data-rows="{{ $phone_number_form_count }}" href="#phone-line" class="phone-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="phone-minus-{{ $phone_number_form }}" data-number="{{ $phone_number_form }}" href="#phone-line" class="phone-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>















