@extends('admin.layouts.master')

@section('content-title', 'PARTNER')
@section('content-header', 'Edit Partner')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.partner.update', $partner) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.partner._form')
        </form>
    </div>
@endsection
