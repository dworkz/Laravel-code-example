@section('docs_content')
    <div class="row">
        <div class="col-sm-4">

            <div class="form-group<?php if($errors->has('name')): ?> has-error<?php endif; ?>">
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
@stop

<div class="block block-bordered">
    <div class="block-header bg-gray-lighter">
        <h3 class="block-title">Документы</h3>
    </div>
    <div class="block-content">

        @yield('docs_content')

    </div>
</div>





