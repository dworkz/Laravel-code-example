
<div class="form-group<?php if($errors->has('name')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Введите название">
            <label for="material-text">Полное название</label>
            @if($errors->has('name'))
                <div class="help-block">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('short_name')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="short_name" value="{{ old('short_name') }}" placeholder="Введите короткое название">
            <label for="material-text">Короткое название</label>
            @if($errors->has('short_name'))
                <div class="help-block">{{ $errors->first('short_name') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('description')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">

            <textarea class="form-control" name="description" rows="3" placeholder="Введите описание"></textarea>
            <label for="material-text">Описание</label>
            @if($errors->has('description'))
                <div class="help-block">{{ $errors->first('description') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('inn')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="inn" value="{{ old('inn') }}" placeholder="Введите ИНН">
            <label for="material-text">ИНН</label>
            @if($errors->has('inn'))
                <div class="help-block">{{ $errors->first('inn') }}</div>
            @endif
        </div>
    </div>
</div>


<div class="form-group<?php if($errors->has('kpp')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="kpp" value="{{ old('inn') }}" placeholder="Введите КПП">
            <label for="material-text">КПП</label>
            @if($errors->has('kpp'))
                <div class="help-block">{{ $errors->first('kpp') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('ogrn')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="ogrn" value="{{ old('ogrn') }}" placeholder="Введите ОГРН">
            <label for="material-text">ОГРН</label>
            @if($errors->has('ogrn'))
                <div class="help-block">{{ $errors->first('ogrn') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('reestr_number')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="reestr_number" value="{{ old('reestr_number') }}" placeholder="Введите @lang('app.reestr_number')">
            <label for="material-text">@lang('app.reestr_number')</label>
            @if($errors->has('reestr_number'))
                <div class="help-block">{{ $errors->first('reestr_number') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('okpo')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="okpo" value="{{ old('okpo') }}" placeholder="Введите ОКПО">
            <label for="material-text">ОКПО</label>
            @if($errors->has('okpo'))
                <div class="help-block">{{ $errors->first('okpo') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('okved')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="okved" value="{{ old('okved') }}" placeholder="Введите  @lang('app.okved')">
            <label for="material-text">@lang('app.okved')</label>
            @if($errors->has('okved'))
                <div class="help-block">{{ $errors->first('okved') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('additional_info')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">

            <textarea class="form-control" name="additional_info" rows="3" placeholder="Введите дополнительную информацию"></textarea>
            <label for="material-text">Дополнительная информация</label>
            @if($errors->has('additional_info'))
                <div class="help-block">{{ $errors->first('additional_info') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('bank_details')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">

            <textarea class="form-control" name="bank_details" rows="3" placeholder="Введите банковскую информацию"></textarea>
            <label for="material-text">Банковская информация</label>
            @if($errors->has('bank_details'))
                <div class="help-block">{{ $errors->first('bank_details') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group<?php if($errors->has('site')): ?> has-error<?php endif; ?>">
    <div class="col-sm-9">
        <div class="form-material">
            <input class="form-control" type="text" name="site" value="{{ old('site') }}" placeholder="Введите сайт">
            <label for="material-text">Сайт</label>
            @if($errors->has('site'))
                <div class="help-block">{{ $errors->first('site') }}</div>
            @endif
        </div>
    </div>
</div>