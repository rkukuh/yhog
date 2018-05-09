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

<div class="row">
    <div class="col-md-9">
        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
            <label for="category_id">
                Category @include('common.form.label-required-field')
            </label>
        
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
    </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error has-feedback' : '' }}">
    <label for="location">Location</label>

    <textarea class="form-control" id="location" 
            name="location">{{ old('location') ?: (isset($event->location) ? $event->location : '') }}</textarea>

    @if ($errors->has('location'))
        @include('common.form.input-error-message', ['message' => $errors->first('location')])
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error has-feedback' : '' }}">
    <label for="description">Description</label>

    <textarea class="form-control" id="description" name="description"
                rows="5">{{ old('description') ?: 
                            (isset($post->description) ? $post->description : '') }}</textarea>

    @if ($errors->has('description'))
        @include('common.form.input-error-message', [
            'message' => $errors->first('description')
        ])
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('start_at') ? 'has-error' : '' }}">
            <label for="start_at">
                Start Date @include('common.form.label-required-field')
            </label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>

                <input type="text" class="form-control" id="start_at" name="start_at" 
                        placeholder="dd/mm/yyyy"
                        value="{{ old('start_at') ?
                                    old('start_at') : (isset($event->start_at) ?
                                                            $event->start_at->format('d/m/Y') :
                                                            Carbon\Carbon::now()->format('d/m/Y')) }}">
            </div>

            @if ($errors->has('start_at'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('start_at')
                ])
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('end_at') ? 'has-error' : '' }}">
            <label for="end_at">
                End Date @include('common.form.label-required-field')
            </label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>

                <input type="text" class="form-control" id="end_at" name="end_at" 
                        placeholder="dd/mm/yyyy"
                        value="{{ old('end_at') ?
                                    old('end_at') : 
                                        (isset($event->end_at) ?
                                                $event->end_at->format('d/m/Y') :
                                                Carbon\Carbon::now()->addDay(1)->format('d/m/Y')) }}">
            </div>

            @if ($errors->has('end_at'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('end_at')
                ])
            @endif
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('images') ? 'has-error has-feedback' : '' }}
        {{ $errors->has('images.*') ? 'has-error has-feedback' : '' }}">

    <label for="images">Featured Image</label>

    <input type="file" name="images[][image]" class="form-control">

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