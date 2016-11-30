<div class="row" id="email-{{ $number_person_form }}-{{ $email_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.email.' . $number_person_form . '.email.' . $email_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Email</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[email][{{ $number_person_form }}][email][]" value="{{ old('person.email.' . $number_person_form . '.email.' . $email_number_form) }}">
                @if($errors->has('person.email.' . $number_person_form . '.email.' . $email_number_form))
                    <div class="help-block">{{ $errors->first('person.email.' . $number_person_form . '.email.' . $email_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('person.email.' . $number_person_form . '.name.' . $email_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Название</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="person[email][{{$number_person_form}}][name][]" value="{{ old('person.email.' . $number_person_form . '.name.' . $email_number_form) }}">
                @if($errors->has('person.email.' . $number_person_form . '.name.' . $email_number_form))
                    <div class="help-block">{{ $errors->first('person.email.' . $number_person_form . '.name.' . $email_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($email_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="email-add-{{ $number_person_form }}" data-rows="{{ $email_number_form_count }}" data-person="{{ $number_person_form }}" href="#email-line-{{ $number_person_form }}" class="email-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="email-{{ $number_person_form }}-{{ $email_number_form }}" data-person="{{ $number_person_form }}" href="#email-line-{{ $number_person_form }}" class="email-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>