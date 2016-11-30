@if($docs->count() > 0)
    <div class="block">
        <div class="block-content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th class="hidden-xs">Описание</th>
                    <th class="text-center">Документ</th>
                    <th class="text-center" style="width: 100px;"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($docs AS $doc)

                    <tr>
                        <td>
                            <a href="#" id="name" class="name" data-type="text" data-pk="{{ $doc->id }}" data-url="/backend/docs/update" data-title="Введите название">
                                {{ $doc->name }}
                            </a>
                        </td>
                        <td class="hidden-xs">
                            <a href="#" id="description" class="description" data-type="text" data-pk="{{ $doc->id }}" data-url="/backend/docs/update" data-title="Введите описание">
                                {{ $doc->description }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/{{ $doc->path_to_doc }}" target="_blank">
                                <i class="si si-doc"></i>
                            </a>
                        </td>
                        <td class="text-right">
                            <a onclick="return confirm('Вы уверены что хотите удалить эту запись?');" href="/backend/docs/destroy/{{ $doc->id }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Удалить"><i class="fa fa-times"></i></a>
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

        <form enctype="multipart/form-data" class="form-horizontal push-10-t" action="/backend/docs/store" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="{{ $input_name }}" value="{{ $input_value }}" />
            <input type="hidden" name="folder" value="{{ $folder }}" />

            <div class="block block-bordered">
                <div class="block-header bg-gray-lighter">
                    @if( ! isset($ajax))
                        <ul class="block-options">
                            <li>
                                <a class="doc-add" href="#doc-blocks" type="radio" title="Добавить еще один"><i class="si si-plus" style="color:red;"></i></a>
                            </li>
                        </ul>
                    @endif
                    <h3 class="block-title">
                        @if(isset($block_title))
                            {{ $block_title }}
                        @else
                            Документы
                        @endif
                    </h3>
                </div>
                <div class="block-content">

                    <div class="row">
                        <div class="col-sm-4">

                            <div  class="form-group<?php if($errors->has('name')): ?> has-error<?php endif; ?>">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="name" value="" placeholder="Введите название">
                                        <label for="material-text">Название</label>
                                        @if($errors->has('name'))
                                            <div class="help-block">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" name="description" value="" placeholder="Введите описание">
                                        <label for="material-text">Описание</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group<?php if($errors->has('path_to_doc')): ?> has-error<?php endif; ?>">
                                <label class="col-xs-12" for="document">Выберите файл</label>
                                <div class="col-xs-12">
                                    <input type="file" id="document" name="path_to_doc">
                                    @if($errors->has('path_to_doc'))
                                        <div class="help-block">{{ $errors->first('path_to_doc') }}</div>
                                    @endif
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