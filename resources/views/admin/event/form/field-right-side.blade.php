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

<div class="form-group {{ $errors->has('partner_id') ? 'has-error has-feedback' : '' }}">
    <label for="partner_id">Partners</label>

    <select class="form-control select2" id="partner_id" name="partner_id[]" multiple>
        @foreach ($partners as $partner)
            <option value="{{ $partner->id }}" 
                
                    {{ old('partner_id') ? (in_array($partner->id, old('partner_id')) ? 'selected' : '') : '' }}

                    {{ isset($event->partners) ? 
                        ((in_array($partner->id, $event->partners->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                {{ $partner->title }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('partner_id'))
        @include('common.form.input-error-message', ['message' => $errors->first('partner_id')])
    @endif

    <span class="help-block">
            Can not spot the Partner you're looking for?

        @component('common.buttons.create-new')
            @slot('size', 'xs')
            @slot('color', 'info')
            @slot('alignment' , '')
            @slot('text', 'New Partner')
            @slot('style', 'display: inline;')
            @slot('route', route('admin.partner.create'))
        @endcomponent
    </span>
</div>

<div class="form-group {{ $errors->has('gallery_id') ? 'has-error has-feedback' : '' }}">
    <label for="gallery_id">Galleries</label>

    <select class="form-control select2" id="gallery_id" name="gallery_id[]" multiple>
        @foreach ($galleries as $gallery)
            <option value="{{ $gallery->id }}" 
                
                    {{ old('gallery_id') ? (in_array($gallery->id, old('gallery_id')) ? 'selected' : '') : '' }}

                    {{ isset($event->galleries) ? 
                        ((in_array($gallery->id, $event->galleries->pluck('id')->toArray()) ? 
                            'selected' : '')) : '' }}>

                {{ $gallery->title }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('gallery_id'))
        @include('common.form.input-error-message', ['message' => $errors->first('gallery_id')])
    @endif

    <span class="help-block">
        Can not spot the Gallery you're looking for?

        @component('common.buttons.create-new')
            @slot('size', 'xs')
            @slot('color', 'info')
            @slot('alignment' , '')
            @slot('text', 'New Gallery')
            @slot('style', 'display: inline;')
            @slot('route', route('admin.gallery.create'))
        @endcomponent
    </span>
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