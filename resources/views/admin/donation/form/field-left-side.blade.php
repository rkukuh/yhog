<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
    <label for="title">
        Donation Title @include('common.form.label-required-field')
    </label>

    <input type="text" class="form-control" id="title" name="title"
            value="{{ old('title') ?: (isset($donation->title) ? $donation->title : '') }}">

    @if ($errors->has('title'))
        @include('common.form.input-error-message', ['message' => $errors->first('title')])
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
                            
                            {{ isset($donation->categories) ? 
                                ((in_array($parent->id, $donation->categories->pluck('id')->toArray()) ? 
                                    'selected' : '')) : '' }}>
        
                        {{ $parent->name }}
                    </option>
                    @foreach ($parent->childs as $child)
                        <option class="level-2" value="{{ $child->id }}"
                            {{ (old('category_id') == $child->id) ? 'selected' : '' }}
                            
                            {{ isset($donation->categories) ? 
                                ((in_array($child->id, $donation->categories->pluck('id')->toArray()) ? 
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

<div class="form-group {{ $errors->has('description') ? 'has-error has-feedback' : '' }}">
    <label for="description">
        Description @include('common.form.label-required-field')
    </label>

    <textarea class="form-control" id="description" name="description"
                rows="5">{{ old('description') ?: (isset($donation->description) ? $donation->description : '') }}</textarea>

    @if ($errors->has('description'))
        @include('common.form.input-error-message', ['message' => $errors->first('description')])
    @endif
</div>