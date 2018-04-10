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

    <textarea class="form-control" id="location" 
            name="location">{{ old('location') ?: (isset($event->location) ? $event->location : '') }}</textarea>

    @if ($errors->has('location'))
        @include('common.form.input-error-message', ['message' => $errors->first('location')])
    @endif
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id">Category</label>

    <select class="form-control select2" id="category_id" name="category_id">
        <option value=""></option>
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
            @slot('route', route('admin.category-event.index'))
        @endcomponent
    </span>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="price">Price</label>

            <input type="number" class="form-control text-right" id="price" name="price"
                    value="{{ old('price') ?: (isset($event->price) ? $event->price : 0) }}">

            @if ($errors->has('price'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('price')
                ])
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
            <label for="size">Audience Size</label>

            <input type="number" class="form-control text-right" id="size" name="size"
                    value="{{ old('size') ?: (isset($event->size) ? $event->size : 0) }}">

            @if ($errors->has('size'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('size')
                ])
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('early_bird_price') ? 'has-error' : '' }}">
            <label for="early_bird_price">Early Bird Price</label>

            <input type="number" class="form-control text-right" id="early_bird_price" name="early_bird_price"
                    value="{{ old('early_bird_price') ?: 
                                (isset($event->early_bird_price) ? 
                                        $event->early_bird_price : 0) }}">

            @if ($errors->has('early_bird_price'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('early_bird_price')
                ])
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('early_bird_price_end_at') ? 'has-error' : '' }}">
            <label for="early_bird_price_end_at">Early Bird End Date</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>

                <input type="text" class="form-control" id="early_bird_price_end_at" name="early_bird_price_end_at" 
                        placeholder="dd/mm/yyyy"
                        value="{{ old('early_bird_price_end_at') ?
                                    old('early_bird_price_end_at') : 
                                        (isset($event->early_bird_price_end_at) ?
                                                $event->early_bird_price_end_at->format('d/m/Y') : '') }}">
            </div>

            @if ($errors->has('early_bird_price_end_at'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('early_bird_price_end_at')
                ])
            @endif
        </div>
    </div>
</div>