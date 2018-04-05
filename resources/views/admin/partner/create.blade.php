@extends('admin.layouts.master')

@section('content-title', 'PARTNER')
@section('content-header', 'Create new Partner')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.partner.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('admin.partner._form')
        </form>
    </div>
@endsection
