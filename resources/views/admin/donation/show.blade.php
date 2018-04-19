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
        <div class="col-md-3">
            <h4>
                Receive History

                @component('common.buttons.create-new')
                    @slot('size', 'xs')
                    @slot('text', 'receive new')
                    @slot('route', route('admin.donate.create'))
                @endcomponent
            </h4>

            <ul class="list-group">
                @foreach ($donation->donates as $donate)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                {{ $donate->amount_formatted }}
                            </div>
                            <div class="col-md-5 pull-right">
                                {{ $donate->created_at_formatted }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection