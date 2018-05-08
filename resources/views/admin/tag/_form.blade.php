<div class="box-header with-border">

    @if (URL::current() == route('admin.tag.index'))

        <h3 class="box-title">Create New Tag</h3>

    @elseif (URL::current() == route('admin.tag.edit', $tag_edit))

        <h3 class="box-title">Edit Tag</h3>

    @endif

</div>

@if (URL::current() == route('admin.tag.index'))

    <form action="{{ route('admin.tag.store') }}" method="post">

@elseif (URL::current() == route('admin.tag.edit', $tag_edit))

    <form action="{{ route('admin.tag.update', $tag_edit) }}" method="post">

        @method('PATCH')

        <input type="hidden" name="page" id="page" value="{{ $_GET['page'] }}">

@endif

        @csrf

        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                <label for="name">
                    Name @include('common.form.label-required-field')
                </label>

                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name') ?: (isset($tag_edit->name) ? $tag_edit->name : '') }}">

                @if ($errors->has('name'))
                    @include('common.form.input-error-message', ['message' => $errors->first('name')])
                @endif
            </div>

            <div class="form-group">
                @component('common.form.button-save-new-or-save-changes')
                    @slot('route_create', route('admin.tag.index'))
                    @slot('route_edit', route('admin.tag.edit', ($tag_edit ?? 0)))
                @endcomponent

                @component('common.form.button-cancel')
                    @slot('route_edit', route('admin.tag.edit', ($tag_edit ?? 0)))
                    @slot('route_redirect', route('admin.tag.index', ['page' => $_GET['page'] ?? 1]))
                @endcomponent
            </div>
        </div>
    </form>