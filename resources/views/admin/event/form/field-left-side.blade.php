<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
    <label for="name">
        Event Name @include('common.form.label-required-field')
    </label>

    <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name') ?: (isset($event->name) ? $event->name : '') }}">

    @if ($errors->has('name'))
        @include('common.form.input-error-message', ['message' => $errors->first('name')])
    @endif
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error has-feedback' : '' }}">
    <label for="location">Location</label>

    <textarea class="form-control" id="location" name="location"
                rows="3">{{ old('location') ?: (isset($event->location) ? $event->location : '') }}</textarea>

    @if ($errors->has('location'))
        @include('common.form.input-error-message', ['message' => $errors->first('location')])
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="price">Price</label>

            <input type="number" class="form-control text-right" id="price" name="price"
                    value="{{ old('price') ?: (isset($event->price) ? $event->price : 0) }}">

            @if ($errors->has('price'))
                @include('common.form.input-error-message-no-feedback', ['message' => $errors->first('price')])
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
            <label for="size">Audience Size</label>

            <input type="number" class="form-control text-right" id="size" name="size"
                    value="{{ old('size') ?: (isset($event->size) ? $event->size : 0) }}">

            @if ($errors->has('size'))
                @include('common.form.input-error-message-no-feedback', ['message' => $errors->first('stock')])
            @endif
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error has-feedback' : '' }}">
    <label for="category_id">
        Category @include('common.form.label-required-field')
    </label>

    <select class="form-control select2" id="category_id" name="category_id">
        @foreach ($parent_categories as $parent)
            <option class="level-1" value="{{ $parent->id }}"
                    {{ (old('category_id') == $parent->id) ? 'selected' : '' }}
                    
                    {{ isset($event->categories) ? 
                        ((in_array($parent->id, $event->categories->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                {{ $parent->name }}
            </option>
            @foreach ($parent->childs as $child)
                <option class="level-2" value="{{ $child->id }}"
                    {{ (old('category_id') == $child->id) ? 'selected' : '' }}
                    
                    {{ isset($event->categories) ? 
                        ((in_array($child->id, $event->categories->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                    — {{ $child->name }}
                </option>
            @endforeach
        @endforeach
    </select>

    @if ($errors->has('category_id'))
        @include('common.form.input-error-message', ['message' => $errors->first('category_id')])
    @endif

    <span class="help-block">
        Can not spot the Category you're looking for?

        @component('common.buttons.create-new')
            @slot('size', 'xs')
            @slot('color', 'info')
            @slot('alignment' , '')
            @slot('text', 'New Category')
            @slot('style', 'display: inline;')
            @slot('route', route('admin.category-event.index'))
        @endcomponent
    </span>
</div>

<div class="form-group {{ $errors->has('images') ? 'has-error has-feedback' : '' }}
        {{ $errors->has('images.*') ? 'has-error has-feedback' : '' }}">

    <label for="images">Images</label>

    <input type="file" name="images[][image]" multiple class="form-control">

    @if ($errors->has('images'))
        @include('common.form.input-error-message', ['message' => $errors->first('images')])
    @endif

    <span class="help-block">
        Acceptable types are PNG or JPG.
    </span>

    @if ($errors->has('images.*'))
        @foreach ($errors->get('images.*') as $image)
            @include('common.form.input-error-message', ['message' => $image[0]])
        @endforeach
    @endif
</div>

<div class="form-group {{ $errors->has('tag_id') ? 'has-error has-feedback' : '' }}">
    <label for="tag_id">Tag</label>

    <select class="form-control select2" id="tag_id" name="tag_id[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                
                    {{ old('tag_id') ? (in_array($tag->id, old('tag_id')) ? 'selected' : '') : '' }}

                    {{ isset($event->tags) ? 
                        ((in_array($tag->id, $event->tags->pluck('id')->toArray()) ? 
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