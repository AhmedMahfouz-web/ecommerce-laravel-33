@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3 mr-2 ml-2" role="alert" id="type-error">
        <span class="alert-inner--icon"><i class="fa fa-times"></i></span>
        <span class="alert-inner--text">{{ Session::get('error') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
    </div>
@endif
