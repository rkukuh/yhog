@extends('admin.layouts.master')

@section('content-title', 'EVENT')
@section('content-header', 'Edit Event')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.event.update', $event) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.event._form')
        </form>
    </div>
@endsection
