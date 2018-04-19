@extends('admin.layouts.master')

@section('content-title')
    GALLERY <small>of Gallery</small>
@endsection

@section('content-header', 'Gallery List')

@section('content-body')
    <div style="margin-bottom: 80px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Gallery')
            @slot('route', route('admin.gallery.create'))
        @endcomponent
    </div>

    @if ($galleries->isEmpty())
        @include('common.datalist.no-data')
    @else
        <div class="row">
            @foreach ($galleries->chunk(3) as $chunked_galleries)
                @foreach ($chunked_galleries as $gallery)
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="{{ route('admin.gallery.show', $gallery) }}">
                                    {{ $gallery->title_limited }}
                                </a> 
                                
                                <br><br>

                                @if ($gallery->featured_image)
                                    <div class="text-center">
                                        <img src="{{ asset('storage/' . $gallery->featured_image->path) }}" 
                                            width="70px">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <i class="fa fa-picture-o fa-5x text-muted"></i>
                                    </div>
                                @endif 
                                
                                <hr>

                                <div class="text-center">
                                    <form method="post" action="{{ route('admin.gallery.update', $gallery) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
            
                                        @if ($gallery->published_at)
                                            @component('common.buttons.submit')
                                                @slot('size', 'xs')
                                                @slot('color', 'warning')
                                                @slot('value', 'draft')
                                                @slot('text', 'Set as Draft')
                                            @endcomponent
                                        @else
                                            @component('common.buttons.submit')
                                                @slot('size', 'xs')
                                                @slot('color', 'info')
                                                @slot('value', 'publish')
                                                @slot('text', 'Publish Now')
                                            @endcomponent
                                        @endif
                                    </form>
        
                                    @component('common.datalist.button-remove')
                                        @slot('text', '')
                                        @slot('size', 'xs')
                                        @slot('route', route('admin.gallery.destroy', $gallery))
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        <div class="text-center">
            {{ $galleries->links() }}
        </div>
    @endif
@endsection
