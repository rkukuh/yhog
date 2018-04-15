@extends('admin.layouts.master')

@section('content-title', 'DONATION')
@section('content-header', 'Create new Donation')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.donation.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('admin.donation._form')
        </form>
    </div>
@endsection
