@extends('admin.layouts.master')

@section('content-title', 'DONATION')
@section('content-header', 'Receive New Donation')

@section('content-body')
    <div class="col-md-12">
        <form action="{{ route('admin.donate.store') }}" method="post">
            @csrf

            @include('admin.donate._form')
        </form>
    </div>
@endsection
