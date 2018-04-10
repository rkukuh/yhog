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
            <label for="size">Participant Size</label>

            <input type="number" class="form-control text-right" id="size" name="size"
                    value="{{ old('size') ?: (isset($event->size) ? $event->size : 0) }}">

            @if ($errors->has('size'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('size')
                ])
            @endif

            <span class="help-block">Leave 0 for no limitation</span>
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

            <span class="help-block">Leave 0 for no early bird price</span>
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

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('total_hours') ? 'has-error' : '' }}">
            <label for="total_hours">Total Hours</label>

            <input type="text" class="form-control" id="total_hours" name="total_hours"
                    value="{{ old('total_hours') ?: 
                                (isset($event->total_hours) ? 
                                        $event->total_hours : '') }}">

            @if ($errors->has('total_hours'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('total_hours')
                ])
            @endif
        </div>
    </div>
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