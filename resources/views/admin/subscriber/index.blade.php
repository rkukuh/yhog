@extends('admin.layouts.master')

@section('content-title', 'SUBSCRIBER')

@section('content-header', 'Subscriber List')

@section('content-body')
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#participant" aria-controls="Event Participant" role="tab" data-toggle="tab">
                    Event Participant
                </a>
            </li>
            <li role="presentation">
                <a href="#donator" aria-controls="Donator" role="tab" data-toggle="tab">
                    Donator
                </a>
            </li>
            <li role="presentation">
                <a href="#contact" aria-controls="Contact" role="tab" data-toggle="tab">
                    Contact
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="participant">
                Event Participant...
            </div>
            <div role="tabpanel" class="tab-pane" id="donator">
                Donator...
            </div>
            <div role="tabpanel" class="tab-pane" id="contact">
                Contact...
            </div>
        </div>
    </div>
@endsection