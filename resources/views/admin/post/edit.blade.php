@extends('admin.layouts.master')

@section('content-title', 'POST')
@section('content-header', 'Edit Post')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.post.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.post._form')
        </form>
    </div>
@endsection
