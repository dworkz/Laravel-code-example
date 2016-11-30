<div class="row" id="email-{{ $email_number_form }}-block">

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('email.email.' . $email_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Email</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="email[email][]" value="{{ old('email.email.' . $email_number_form) }}">
                @if($errors->has('email.email.' . $email_number_form))
                    <div class="help-block">{{ $errors->first('email.email.' . $email_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="form-group<?php if($errors->has('email.name.' . $email_number_form)): ?> has-error<?php endif; ?>">

            <label class="col-xs-12">Описание</label>

            <div class="col-sm-12">
                <input class="form-control" type="text" name="email[name][]" value="{{ old('email.name.' . $email_number_form) }}">
                @if($errors->has('email.name.' . $email_number_form))
                    <div class="help-block">{{ $errors->first('email.name.' . $email_number_form) }}</div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-sm-2 text-center">


        @if($email_number_form === 0)

            <div class="form-group">
                <label class="col-xs-12" for="">&nbsp;</label>
                <div class="col-sm-12">
                    <a id="email-add-{{ $email_number_form }}" data-rows="{{ $email_number_form_count }}" href="#email-line" class="email-add btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <a id="email-minus-{{ $email_number_form }}" data-number="{{ $email_number_form }}" href="#email-line" class="email-minus btn btn-default" type="button">
                        <i class="fa fa-minus"></i>
                    </a>
                </div>
            </div>

        @endif

    </div>

</div>















