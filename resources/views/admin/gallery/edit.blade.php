@extends('admin.layouts.master')

@section('content-title', 'GALLERY')
@section('content-header', 'Edit Gallery')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.gallery._form')
        </form>
    </div>
@endsection
