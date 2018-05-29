@extends('admin.layouts.master')

@section('content-title', 'SUBSCRIBER')

@section('content-header', 'Subscriber List')

@section('content-body')
    <div class="row">
        <div class="col-md-8">
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
        </div>

        <div class="col-md-4">
            <h4 class="text-center">Export Data</h4>

            <div class="list-group">
                <div href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="list-group-item-heading">
                                Event Participant <br>

                                <small>first name, last name, email, phone</small>
                            </h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('csv.participant') }}" class="btn btn-info btn-sm">
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
                <div href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="list-group-item-heading">
                                Donator
                            </h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="btn btn-info btn-sm">
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
                <div href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="list-group-item-heading">
                                Contact
                            </h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="btn btn-info btn-sm">
                                Download CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection