@extends('admin.layouts.master')

@section('content-title', 'GALLERY')
@section('content-header', 'Create new Gallery')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('admin.gallery._form')
        </form>
    </div>
@endsection
