@extends('admin.layouts.master')

@section('content-title', 'SUBSCRIBER')

@section('content-header', 'Subscriber List')

@section('content-body')
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#participant" aria-controls="participant" role="tab" data-toggle="tab">
                    Event Participant
                </a>
            </li>
            <li role="presentation">
                <a href="#donator" aria-controls="donator" role="tab" data-toggle="tab">
                    Donator
                </a>
            </li>
            <li role="presentation">
                <a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">
                    Contact
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="participant">
                @include('admin.subscriber.datalist.participants')
            </div>
            <div role="tabpanel" class="tab-pane" id="donator">
                @include('admin.subscriber.datalist.donators')
            </div>
            <div role="tabpanel" class="tab-pane" id="contact">
                @include('admin.subscriber.datalist.contacts')
            </div>
        </div>
    </div>
@endsection