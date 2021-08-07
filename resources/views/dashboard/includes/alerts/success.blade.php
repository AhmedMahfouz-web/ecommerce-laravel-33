@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3 mr-2 ml-2" role="alert" id="type-success">
        <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
        <span class="alert-inner--text">{{ Session::get('success') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
