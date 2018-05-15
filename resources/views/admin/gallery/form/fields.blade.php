<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
    <label for="title">
        Title @include('common.form.label-required-field')
    </label>

    <input type="text" class="form-control" id="title" name="title"
            value="{{ old('title') ?: (isset($gallery->title) ? $gallery->title : '') }}">

    @if ($errors->has('title'))
        @include('common.form.input-error-message', ['message' => $errors->first('title')])
    @endif
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id">
        Category @include('common.form.label-required-field')
    </label>

    <select class="form-control select2" id="category_id" name="category_id">
        <option value=""></option>
        
        @foreach ($parent_categories as $parent)
            <option class="level-1" value="{{ $parent->id }}"
                    {{ (old('category_id') == $parent->id) ? 'selected' : '' }}
                    
                    {{ isset($gallery->categories) ? 
                        ((in_array($parent->id, $gallery->categories->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                {{ $parent->name }}
            </option>
            @foreach ($parent->childs as $child)
                <option class="level-2" value="{{ $child->id }}"
                    {{ (old('category_id') == $child->id) ? 'selected' : '' }}
                    
                    {{ isset($gallery->categories) ? 
                        ((in_array($child->id, $gallery->categories->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                    — {{ $child->name }}
                </option>
            @endforeach
        @endforeach
    </select>

    @if ($errors->has('category_id'))
        @include('common.form.input-error-message-no-feedback', [
            'message' => $errors->first('category_id')
        ])
    @endif

    <span class="help-block">
        Can not spot the Category you're looking for?

        @component('common.buttons.create-new')
            @slot('size', 'xs')
            @slot('color', 'info')
            @slot('alignment' , '')
            @slot('text', 'New Category')
            @slot('style', 'display: inline;')
            @slot('route', route('admin.category-gallery.index'))
        @endcomponent
    </span>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error has-feedback' : '' }}">
    <label for="description">
        Description @include('common.form.label-required-field')
    </label>

    <textarea class="form-control" id="description" name="description"
                rows="5">{{ old('description') ?: (isset($gallery->description) ? $gallery->description : '') }}</textarea>

    @if ($errors->has('description'))
        @include('common.form.input-error-message', ['message' => $errors->first('description')])
    @endif
</div>

<div class="control-group 
        {{ $errors->has('images') ? 'has-error' : '' }}
        {{ $errors->has('images.*') ? 'has-error' : '' }}">

    <label for="images">
        Images @include('common.form.label-required-field')
    </label>

    <div class="controls"> 
        <div class="entry input-group col-md-8">
            <input type="file" name="images[][image]" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </span>
        </div>
    </div>

    @if ($errors->has('images'))
        @include('common.form.input-error-message-no-feedback', [
            'message' => $errors->first('images')
        ])
    @endif

    <span class="help-block">Acceptable types are PNG or JPG.</span>

    @if ($errors->has('images.*'))
        @foreach ($errors->get('images.*') as $image)
            @include('common.form.input-error-message-no-feedback', ['message' => $image[0]])
        @endforeach
    @endif

</div>

<div class="form-group {{ $errors->has('tag_id') ? 'has-error has-feedback' : '' }}">
    <label for="tag_id">Tag</label>

    <select class="form-control select2" id="tag_id" name="tag_id[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                
                    {{ old('tag_id') ? (in_array($tag->id, old('tag_id')) ? 'selected' : '') : '' }}

                    {{ isset($gallery->tags) ? 
                        ((in_array($tag->id, $gallery->tags->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('tag_id'))
        @include('common.form.input-error-message', ['message' => $errors->first('tag_id')])
    @endif

    <span class="help-block">
        Can not spot the Tag you're looking for?

        @component('common.buttons.create-new')
            @slot('size', 'xs')
            @slot('color', 'info')
            @slot('alignment' , '')
            @slot('text', 'New Tag')
            @slot('style', 'display: inline;')
            @slot('route', route('admin.tag.index'))
        @endcomponent
    </span>
</div>


@push('header-scripts')
    <style>
        .glyphicon { font-size: 12px; }
        .entry:not(:first-of-type) { margin-top: 10px; }
    </style>
@endpush

@push('footer-scripts')
    <script>
        $(function() {

            $(document).on('click', '.btn-add', function(e) {

                e.preventDefault();

                var controlForm     = $('.controls'),
                    currentEntry    = $(this).parents('.entry:first'),
                    newEntry        = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');

                controlForm.find('.entry:not(:last) .btn-add')
                            .removeClass('btn-add').addClass('btn-remove')
                            .removeClass('btn-success').addClass('btn-danger')
                            .html('<span class="glyphicon glyphicon-minus"></span>');

            })
            .on('click', '.btn-remove', function(e) {

                $(this).parents('.entry:first').remove();

                e.preventDefault();

                return false;
            });
        });

    </script>
@endpush