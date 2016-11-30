@if(Session::has('errors'))
    <div class="row" style="padding-top: 10;">
        <div class="col-xs-3"></div>
        <div class="col-xs-6 alert alert-warning" role="alert">
            <ol>
                @foreach($errors->all() as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ol>
        </div>
        <div class="col-xs-3"></div>
    </div>
@endif