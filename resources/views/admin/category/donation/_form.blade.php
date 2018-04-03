<div class="box-header with-border">

    @if (URL::current() == route('admin.category-donation.index'))

        <h3 class="box-title">Create New Donation Category</h3>

    @elseif (URL::current() == route('admin.category-donation.edit', $category_edit))

        <h3 class="box-title">Edit Donation Category</h3>

    @endif

</div>

@if (URL::current() == route('admin.category-donation.index'))

    <form action="{{ route('admin.category-donation.store') }}" method="post">

@elseif (URL::current() == route('admin.category-donation.edit', $category_edit))

    <form action="{{ route('admin.category-donation.update', $category_edit) }}" method="post">

        @method('PATCH')

        <input type="hidden" name="page" id="name" value="{{ $_GET['page'] }}">

@endif

        @csrf

        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                <label for="name">
                    Name @include('common.form.label-required-field')
                </label>

                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name') ?: (isset($category_edit->name) ? $category_edit->name : '') }}">

                @if ($errors->has('name'))
                    @include('common.form.input-error-message', ['message' => $errors->first('name')])
                @endif
            </div>

            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                <label for="parent_id">
                    Parent @include('common.form.label-required-field')
                </label>

                <select class="form-control select2" id="parent_id" name="parent_id">
                    <option value="">(no parent)</option>

                    @foreach ($categories as $categoryLv1)
                        <option class="level-1" value="{{ $categoryLv1->id }}"
                                {{ (old('parent_id') == $categoryLv1->id) ? 'selected' : '' }}
                                {{ isset($category_edit) ?
                                        (($category_edit->parent_id == $categoryLv1->id) ? 'selected' : '') : '' }}>

                            {{ $categoryLv1->name }}
                        </option>
                        @foreach ($categoryLv1->childs as $subcategory)
                            <option class="level-2" value="{{ $subcategory->id }}"
                                {{ (old('parent_id') == $subcategory->id) ? 'selected' : '' }}
                                {{ isset($category_edit) ?
                                        (($category_edit->parent_id == $subcategory->id) ? 'selected' : '') : '' }}>

                                — {{ $subcategory->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>

                @if ($errors->has('parent_id'))
                    @include('common.form.input-error-message-no-feedback', [
                        'message' => $errors->first('parent_id')
                    ])
                @endif
            </div>

            <div class="form-group">
                @component('common.form.button-save-new-or-save-changes')
                    @slot('route_create', route('admin.category-donation.index'))
                    @slot('route_edit', route('admin.category-donation.edit', ($category_edit ?? 0)))
                @endcomponent

                @component('common.form.button-cancel')
                    @slot('route_edit', route('admin.category-donation.edit', ($category_edit ?? 0)))
                    @slot('route_redirect', route('admin.category-donation.index', ['page' => $_GET['page'] ?? 1]))
                @endcomponent
            </div>
        </div>
    </form>


@push('header-scripts')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endpush