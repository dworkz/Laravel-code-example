@section('phone_content')
    <div class="row">
        <div class="col-sm-5">

            <div class="form-group<?php if($errors->has('phone.0')): ?> has-error<?php endif; ?>">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" name="phone[]" value="" placeholder="Введите телефон">
                        <label for="material-text">Телефон</label>
                        @if($errors->has('phone.0'))
                            <div class="help-block">{{ $errors->first('phone.0') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" name="phone_desc[]" value="" placeholder="Введите описание">
                        <label for="material-text">Описание</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
        @if( ! isset($ajax))
            <ul class="block-options">
                <li>
                    <a class="phone-add" href="#phone-blocks" type="radio" title="Добавить еще один"><i class="si si-plus" style="color:green;"></i></a>
                </li>
            </ul>
        @else

            <ul class="block-options">
                <li>
                    <a id="phone-minus-" class="phone-minus" href="#phone-blocks" type="radio" title="Добавить еще один"><i class="si si-close" style="color:red;"></i></a>
                </li>
            </ul>

        @endif
        <h3 class="block-title">
            @if(isset($block_title))
                {{ $block_title }}
            @else
                Контактный телефон
            @endif
        </h3>
    </div>
    <div class="block-content">

        @yield('phone_content')

    </div>
</div>





