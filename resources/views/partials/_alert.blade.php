@if(!empty(session('danger-msg')))
    <div class="alert alert-danger" role="alert">
        <i class="fa fa-crosshairs"></i> {{session('danger-msg')}}
    </div>
@endif

@if(!empty(session('success-msg')))
    <div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i> {{session('success-msg')}}
    </div>   
@endif