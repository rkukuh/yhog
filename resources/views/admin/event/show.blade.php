@extends('admin.layouts.master')

@section('content-title')
    <small class="text-muted">Event Detail</small>
    <h3>{{ $event->name }}</h3>
@endsection

@section('content-header')
@endsection

@section('content-body')
    <div class="row">
        <div class="col-md-5">
            <h4>Event Info</h4>

            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Location</h4>

                    <p class="list-group-item-text">
                        {{ $event->location_formatted }}
                    </p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Description</h4>

                    <p class="list-group-item-text">
                        {!! $event->description !!}
                    </p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Price</h4>

                    <p class="list-group-item-text">
                        {{ $event->price_formatted }}
                    </p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="list-group-item-heading">Start Date</h4>

                            <p class="list-group-item-text">
                                {{ $event->start_at_formatted }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="list-group-item-heading">End Date</h4>

                            <p class="list-group-item-text">
                                {{ $event->end_at_formatted }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-md-4">
            <h4>Participant</h4>

            @if ($event->participants->isEmpty())
                @component('common.datalist.no-data')
                    @slot('text', 'No participant yet.')
                @endcomponent
            @else
                <ul class="list-group">
                    @foreach ($event->participants()->latest()->get() as $participant)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    {{ $participant->first_name }} {{ $participant->last_name }} 
                                    
                                    <br><br>
                                    
                                    <i class="fa fa-phone"></i> {{ $participant->phone }} 
                                    
                                    <br>
                                    
                                    <i class="fa fa-envelope"></i> 
                                    <a href="mailto: {{ $participant->email }}">
                                        {{ $participant->email }}
                                    </a>
                                </div>
                                <div class="col-md-4 text-right">
                                    <span>
                                        {{ $participant->quantity }} 

                                        <small class="text-muted">
                                            {{ str_plural('ticket', $participant->quantity) }}
                                        </small> 

                                        <br>

                                        {{ number_format($participant->price * $participant->quantity) }} 

                                        <small class="text-muted">IDR</small>
                                    </span>
                                </div>
                                <div class="col-md-2 text-right">
                                    @component('common.datalist.button-remove')
                                        @slot('text', '')
                                        @slot('route', route('participant.destroy', $participant))
                                    @endcomponent
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection


@push('header-scripts')
    <style>
        .list-group-item-heading { margin-bottom: 20px; }
    </style>
@endpush