<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('target') ? 'has-error' : '' }}">
            <label for="target">Target Amount</label>

            <input type="number" class="form-control text-right" id="target" name="target"
                    value="{{ old('target') ?: (isset($donation->target) ? $donation->target : 0) }}">

            @if ($errors->has('target'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('target')
                ])
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('end_at') ? 'has-error' : '' }}">
            <label for="end_at">
                Deadline @include('common.form.label-required-field')
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
                                                Carbon\Carbon::now()->addMonth(1)->format('d/m/Y')) }}">
            </div>

            @if ($errors->has('end_at'))
                @include('common.form.input-error-message-no-feedback', [
                    'message' => $errors->first('end_at')
                ])
            @endif
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error has-feedback' : '' }}">
    <label for="location">Location</label>

    <textarea class="form-control" id="location" 
            name="location">{{ old('location') ?: (isset($donation->location) ? $donation->location : '') }}</textarea>

    @if ($errors->has('location'))
        @include('common.form.input-error-message', ['message' => $errors->first('location')])
    @endif
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

<div class="form-group {{ $errors->has('video_url') ? 'has-error has-feedback' : '' }}">
    <label for="video_url">Video URL</label>

    <input type="text" class="form-control" id="video_url" name="video_url" 
            placeholder="https://www.youtube.com/watch?v=123"
            value="{{ old('video_url') ?: (isset($donation->video_url) ? $donation->video_url : '') }}">

    @if ($errors->has('video_url'))
        @include('common.form.input-error-message', ['message' => $errors->first('video_url')])
    @endif
</div>