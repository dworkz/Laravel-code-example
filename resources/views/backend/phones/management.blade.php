@if($phones->count() > 0)
    <div class="block">
        <div class="block-content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Телефон</th>
                    <th class="hidden-xs">Описание</th>
                    <th class="text-center">Основной?</th>
                    <th class="text-center" style="width: 100px;"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($phones AS $phone)

                    <tr>
                        <td>
                            <a href="#" id="number" class="number" data-type="text" data-pk="{{ $phone->id }}" data-url="/backend/phones/update" data-title="Введите телефон">
                                {{ $phone->number }}
                            </a>
                        </td>
                        <td class="hidden-xs">
                            <a href="#" id="name" class="name" data-type="text" data-pk="{{ $phone->id }}" data-url="/backend/phones/update" data-title="Введите описание">
                                {{ $phone->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/backend/phones/main/{{ $phone->id }}">
                                @if($phone->is_main > 0)
                                    <i class="si si-check text-success"></i>
                                @else
                                    <i class="si si-close text-danger"></i>
                                @endif
                            </a>
                        </td>
                        <td class="text-right">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/phones/destroy/{{ $phone->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

<div class="block">
    <div class="block-content">

        <form class="form-horizontal push-10-t" action="/backend/phones/store" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="{{ $input_name }}" value="{{ $input_value }}" />

            <div class="block block-bordered">
                <div class="block-header bg-gray-lighter">
                    @if( ! isset($ajax))
                        <ul class="block-options">
                            <li>
                                <a class="phone-add" href="#phone-blocks" type="radio" title="Добавить еще один"><i class="si si-plus" style="color:red;"></i></a>
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

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-group<?php if($errors->has('number.0')): ?> has-error<?php endif; ?>">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="number[]" value="" placeholder="Введите телефон">
                                        <label for="material-text">Телефон</label>
                                        @if($errors->has('number.0'))
                                            <div class="help-block">{{ $errors->first('number.0') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="name[]" value="" placeholder="Введите описание">
                                        <label for="material-text">Описание</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9">
                    <button class="btn btn-sm btn-default" type="submit">Сохранить</button>
                </div>
            </div>
        </form>

    </div>
</div>

@section('head_code')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('footer_js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '<?php echo csrf_token() ?>'
            }
        });
        $(document).ready(function() {
            //toggle `popup` / `inline` mode
            $.fn.editable.defaults.mode = 'inline';
            $('.number').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
            $('.name').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
        });
    </script>
@stop