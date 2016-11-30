
<div class="col-sm-12" id="product-{{ $number_form }}-block">

    <div class="row">
        <div class="col-sm-3">

            <div class="form-group<?php if($errors->has('product.name.' . $number_form)): ?> has-error<?php endif; ?>">
                @if($number_form === 0)
                    <label class="col-xs-12">Наименование товара (услуги)</label>
                @endif
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="product[name][]" value="{{ old('product.name.' . $number_form, isset($product->name) ? $product->name : '') }}">
                    @if($errors->has('product.name.' . $number_form))
                        <div class="help-block">{{ $errors->first('product.name.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-sm-2">

            <div class="form-group<?php if($errors->has('product.qty.' . $number_form)): ?> has-error<?php endif; ?>">
                @if($number_form === 0)
                    <label class="col-xs-12" for="">Кол-во</label>
                @endif
                <div class="col-sm-12">
                    <input id="qty-{{ $number_form }}" data-row="{{ $number_form }}" class="qty form-control" type="text" name="product[qty][]" value="{{ old('product.qty.' . $number_form, isset($product->qty) ? $product->qty : '') }}">
                    @if($errors->has('product.qty.' . $number_form))
                        <div class="help-block">{{ $errors->first('product.qty.' . $number_form) }}</div>
                    @endif
                </div>
            </div>


        </div>
        <div class="col-sm-2">


            <div class="form-group<?php if($errors->has('product.unit.' . $number_form)): ?> has-error<?php endif; ?>">

                @if($number_form === 0)
                    <label class="col-xs-12" for="">Ед. Изм.</label>
                @endif
                <div class="col-sm-12">
                    <input class="form-control" type="text" id="" name="product[unit][]" value="{{ old('product.unit.' . $number_form, isset($product->unit) ? $product->unit : '') }}">
                    @if($errors->has('product.unit.' . $number_form))
                        <div class="help-block">{{ $errors->first('product.unit.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-sm-2">


            <div class="form-group<?php if($errors->has('product.price.' . $number_form)): ?> has-error<?php endif; ?>">

                @if($number_form === 0)
                    <label class="col-xs-12" for="">Цена</label>
                @endif
                <div class="col-sm-12">
                    <input id="price-{{ $number_form }}" data-row="{{ $number_form }}"  class="price form-control" type="text" name="product[price][]" value="{{ old('product.price.' . $number_form, isset($product->price) ? $product->price : '') }}">
                    @if($errors->has('product.price.' . $number_form))
                        <div class="help-block">{{ $errors->first('product.price.' . $number_form) }}</div>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-sm-2">


            <div class="form-group">

                @if($number_form === 0)
                    <label class="col-xs-12" for="">Сумма</label>
                @endif
                <div class="col-sm-12">

                    <?php

                        if(isset($product))
                        {
                            $sum = old('product.sum.' . $number_form, number_format(($product->qty * $product->price), 2));
                        }
                        else
                        {
                            $sum = old('product.sum.' . $number_form);
                        }

                    ?>

                    <input class="sum form-control" type="text" id="sum-{{ $number_form }}" name="product[sum][]" value="{{ $sum }}" disabled>
                </div>
            </div>

        </div>

        <div class="col-sm-1">


            @if($number_form === 0)

                <div class="form-group">
                    <label class="col-xs-12" for="">&nbsp;</label>
                    <div class="col-sm-12">
                        <a id="product-add" data-rows="{{ $number_form_count }}" href="#products-line" class="btn btn-success" type="button"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <div class="col-sm-12">
                        <a id="product-{{ $number_form }}" href="#" class="product-minus btn btn-warning" type="button"><i class="fa fa-minus"></i></a>
                    </div>
                </div>

            @endif

        </div>

    </div>


</div>