@if($address->count() > 0)
    <div class="block">
        <div class="block-content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Адрес</th>
                    <th class="hidden-xs">Описание</th>
                    <th class="text-center">Основной?</th>
                    <th class="text-center" style="width: 100px;"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($address AS $a)

                    <tr>
                        <td>
                            <a href="#" id="name" class="name" data-type="text" data-pk="{{ $a->id }}" data-url="/backend/address/update" data-title="Введите адрес">
                                {{ $a->name }}
                            </a>
                        </td>
                        <td class="hidden-xs">
                            <a href="#" id="description" class="description" data-type="text" data-pk="{{ $a->id }}" data-url="/backend/address/update" data-title="Введите описание">
                                {{ $a->description }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/backend/address/main/{{ $a->id }}">
                                @if($a->is_main > 0)
                                    <i class="si si-check text-success"></i>
                                @else
                                    <i class="si si-close text-danger"></i>
                                @endif
                            </a>
                        </td>
                        <td class="text-right">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/address/destroy/{{ $a->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
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

        <form class="form-horizontal push-10-t" action="/backend/address/store" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="{{ $input_name }}" value="{{ $input_value }}" />

            <div class="block block-bordered">
                <div class="block-header bg-gray-lighter">
                    @if( ! isset($ajax))
                        <ul class="block-options">
                            <li>
                                <a class="address-add" href="#address-blocks" type="radio" title="Добавить еще один"><i class="si si-plus" style="color:red;"></i></a>
                            </li>
                        </ul>
                    @endif
                    <h3 class="block-title">
                        @if(isset($block_title))
                            {{ $block_title }}
                        @else
                            Адреса
                        @endif
                    </h3>
                </div>
                <div class="block-content">

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-group<?php if($errors->has('name.0')): ?> has-error<?php endif; ?>">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="name[]" value="" placeholder="Введите адрес">
                                        <label for="material-text">Адрес</label>
                                        @if($errors->has('name.0'))
                                            <div class="help-block">{{ $errors->first('name.0') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="description[]" value="" placeholder="Введите описание">
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
            $('.name').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
            $('.description').editable({
                success: function(response, newValue) {
                    if(response.status == 'error') return response.msg;
                }
            });
        });
    </script>
@stop