@extends('admin.layouts.master')

@section('content-title', 'DONATION')
@section('content-header', 'Edit Donation')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.donation.update', $donation) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.donation._form')
        </form>
    </div>
@endsection
