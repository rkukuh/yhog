@extends('admin.layouts.master')

@section('content-title', 'EVENT')
@section('content-header', 'Create new Event')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('admin.event._form')
        </form>
    </div>
@endsection
