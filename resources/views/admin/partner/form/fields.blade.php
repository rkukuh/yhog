<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category">
        Category @include('common.form.label-required-field')
    </label> 

    <label class="radio-inline">
        <input type="radio" name="category" value="yayasan-partner" 
                {{ (old('category') == 'yayasan-partner') ? 'checked' : '' }}> 
        Yayasan Partner
    </label>
    <label class="radio-inline">
        <input type="radio" name="category" value="event-partner" 
                {{ (old('category') == 'event-partner') ? 'checked' : '' }}> 
        Event Partner
    </label>
    
    @if ($errors->has('category'))
        @include('common.form.input-error-message-no-feedback', [
            'message' => $errors->first('category')
        ])
    @endif
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
    <label for="title">
        Title @include('common.form.label-required-field')
    </label>

    <input type="text" class="form-control" id="title" name="title"
            value="{{ old('title') ?: (isset($partner->title) ? $partner->title : '') }}">

    @if ($errors->has('title'))
        @include('common.form.input-error-message', ['message' => $errors->first('title')])
    @endif
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error has-feedback' : '' }}">
    <label for="body">
        Content @include('common.form.label-required-field')
    </label>

    <textarea class="form-control" id="body" name="body"
                rows="5">{{ old('body') ?: (isset($partner->body) ? $partner->body : '') }}</textarea>

    @if ($errors->has('body'))
        @include('common.form.input-error-message', ['message' => $errors->first('body')])
    @endif
</div>

<div class="form-group {{ $errors->has('tag_id') ? 'has-error has-feedback' : '' }}">
    <label for="tag_id">Tag</label>

    <select class="form-control select2" id="tag_id" name="tag_id[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                
                    {{ old('tag_id') ? (in_array($tag->id, old('tag_id')) ? 'selected' : '') : '' }}

                    {{ isset($partner->tags) ? 
                        ((in_array($tag->id, $partner->tags->pluck('id')->toArray()) ? 
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

<div class="form-group {{ $errors->has('images') ? 'has-error has-feedback' : '' }}
        {{ $errors->has('images.*') ? 'has-error has-feedback' : '' }}">

    <label for="images">
        Featured Image @include('common.form.label-required-field')
    </label>

    <input type="file" name="images[][image]" multiple class="form-control">

    @if ($errors->has('images'))
        @include('common.form.input-error-message', ['message' => $errors->first('images')])
    @endif

    <span class="help-block">Acceptable types are PNG or JPG.</span>

    @if ($errors->has('images.*'))
        @foreach ($errors->get('images.*') as $image)
            @include('common.form.input-error-message', ['message' => $image[0]])
        @endforeach
    @endif
</div>