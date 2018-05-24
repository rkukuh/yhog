@extends('admin.layouts.master')

@section('content-title')
    <small class="text-muted">Donation Detail</small>
    <h3>{{ $donation->title }}</h3>
@endsection

@section('content-header')
@endsection

@section('content-body')
    <div class="row">
        <div class="col-md-5">
            <h4>Donation Info</h4>

            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Target</h4>

                    <p class="list-group-item-text">
                        {{ $donation->target_formatted }}
                    </p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Deadline</h4>

                    <p class="list-group-item-text">
                        {{ $donation->deadline }}
                    </p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Description</h4>

                    <p class="list-group-item-text">
                        {{ $donation->description }}
                    </p>
                </a>
            </div>
        </div>
        <div class="col-md-7">
            <h4>Receive History</h4>

            <form action="{{ route('admin.donate.store') }}" method="post" class="form-inline">
                @csrf

                <input type="hidden" name="donation_id" value="{{ $donation->id }}">

                <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                    <input type="number" class="form-control text-right" id="amount" name="amount"
                            value="{{ old('amount') ?: 0 }}">
        
                    @if ($errors->has('amount'))
                        @include('common.form.input-error-message-no-feedback', [
                            'message' => $errors->first('amount')
                        ])
                    @endif
                </div>

                @component('common.buttons.submit')
                    @slot('color', 'primary')
                    @slot('text', 'Receive New')
                @endcomponent
            </form> <br>

            <ul class="list-group">
                @foreach ($donation->donates()->latest()->get() as $donate)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                {{ $donate->first_name }} {{ $donate->last_name }}
                                <br>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ $donate->email }}">
                                    {{ $donate->email }}
                                </a>
                            </div>
                            <div class="col-md-2 text-right">
                                {{ $donate->amount_formatted }}
                            </div>
                            <div class="col-md-2 text-center">
                                <span class="text-muted">
                                    {{ $donate->created_at_formatted }}
                                </span>
                            </div>
                            <div class="col-md-2 text-center">
                                {{ $donate->invoice_url }}
                            </div>
                            <div class="col-md-2 text-right">
                                @component('common.datalist.button-remove')
                                    @slot('text', '')
                                    @slot('route', route('admin.donate.destroy', $donate))
                                @endcomponent
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection