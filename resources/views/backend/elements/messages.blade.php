@if(Session::has('message'))
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 alert alert-warning" role="alert">
            {{ Session::get('message') }}
        </div>
        <div class="col-lg-3"></div>
    </div>
@endif