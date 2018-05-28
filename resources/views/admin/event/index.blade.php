@extends('admin.layouts.master')

@section('content-title')
    EVENT <small>of Event</small>
@endsection

@section('content-header', 'Event List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Event')
            @slot('route', route('admin.event.create'))
        @endcomponent
    </div>

    @if ($events->isEmpty())
        @component('common.datalist.no-data')
            @slot('text', 'No event yet. Be the first to create!')
        @endcomponent
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Event Name</th>
                    <th class="text-center" style="width: 300px;">Venue</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Gallery</th>
                    <th class="text-center">Start At</th>
                    <th class="text-center">End At</th>
                    <th class="text-center">Participant</th>
                    <th style="width: 120px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="text-center">
                            @if ($event->featured_image)
                                <img src="{{ asset('storage/' . $event->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <h5 style="font-size: 16px;">
                                <a href="{{ route('admin.event.show', $event) }}">
                                    {{ $event->name }}
                                </a>
                            </h5>

                            <small class="text-muted">
                                <i class="fa fa-folder"></i> {{ $event->category_link }}
                            </small> <br>

                            <small class="text-muted">
                                <i class="fa fa-tag"></i> {{ $event->tag_list }}
                            </small>
                        </td>
                        <td>
                            {{ $event->location_formatted }}
                        </td>
                        <td class="text-right">
                            {{ $event->price_formatted }}
                        </td>
                        <td class="text-center">
                            @if ( ! $event->galleries->isEmpty() )
                                <a href="#">
                                    <i class="fa fa-image"></i>
                                </a>
                            @else
                                <span class="text-muted">no gallery</span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $event->start_at_formatted }}
                        </td>
                        <td class="text-center">
                            {{ $event->end_at_formatted }}
                        </td>
                        <td class="text-center">
                            {{ $event->size_formatted }} 
                            
                            <br><br>

                            @if ($event->participants->count())
                                <a href="{{ route('admin.event.show', $event) }}">
                                    {{ $event->participant }}
                                </a>
                            @else
                                {{ $event->participant }}
                            @endif
                        </td>
                        <td class="text-right">
                            @component('common.datalist.button-edit')
                                @slot('text', '')
                                @slot('route', route('admin.event.edit', $event))
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.event.destroy', $event))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $events->links() }}
        </div>
    @endif
@endsection
