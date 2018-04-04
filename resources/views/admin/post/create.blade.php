@extends('admin.layouts.master')

@section('content-title', 'POST')
@section('content-header', 'Create new Post')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('admin.post._form')
        </form>
    </div>
@endsection
