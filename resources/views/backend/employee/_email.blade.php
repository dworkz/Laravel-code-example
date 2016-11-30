@section('email_content')
    <div class="row">
        <div class="col-sm-5">

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" name="email[]" value="" placeholder="Введите email">
                        <label for="material-text">Email</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" name="email_desc[]" value="" placeholder="Введите описание">
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
                    <a class="email-add" href="#email-blocks" type="radio" title="Добавить еще один"><i class="si si-plus" style="color:red;"></i></a>
                </li>
            </ul>
        @endif
        <h3 class="block-title">
            @if(isset($block_title))
                {{ $block_title }}
            @else
                Email
            @endif

        </h3>
    </div>
    <div class="block-content">

        @yield('email_content')

    </div>
</div>





