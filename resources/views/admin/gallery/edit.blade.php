@extends('admin.layouts.master')

@section('content-title', 'GALLERY')
@section('content-header', 'Edit Gallery')

@section('content-body')
    <div class="col-md-12">
        @if ($mode == 'edit')
            @if ($gallery->images->isEmpty())
                @component('common.datalist.no-data')
                    @slot('text', 'No image for this gallery')
                @endcomponent
            @else
                @foreach ($gallery->images->chunk(6) as $chuncked_images)
                    @foreach ($chuncked_images as $image)
                        <div class="col-md-2" style="padding: 5px;">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{ asset('storage/' . $image->path) }}" width="100%"> 
                                
                                    <div class="text-center" style="margin-top: 5px;">
                                        @component('common.datalist.button-remove')
                                            @slot('size', 'xs')
                                            @slot('route', route('admin.image.destroy', $image))
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endif
        @endif 
    </div>
    
    <div class="col-md-12">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="post" 
              enctype="multipart/form-data">
              
            @csrf
            @method('PATCH')

            @include('admin.gallery._form')
        </form>
    </div>
@endsection
