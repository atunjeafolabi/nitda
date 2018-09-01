@if(!empty(session('danger-msg')))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-crosshairs"></i> {{session('danger-msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>
@endif

@if(!empty(session('success-msg')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check"></i> {{session('success-msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times</span>
        </button>
    </div>   
@endif