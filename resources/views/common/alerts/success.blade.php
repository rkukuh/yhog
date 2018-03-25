<div class="box-body">
    <div class="alert alert-success alert-dismissible">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <h4>
            <i class="icon fa fa-{{ $icon or 'check' }}"></i>

            {{ $title or 'Success!' }}
        </h4>

        {{ session('success-message') }}
    </div>
</div>
