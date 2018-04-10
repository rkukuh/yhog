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
                    <th class="text-center">Venue</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Audience Limit</th>
                    <th class="text-center">Created At</th>
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
                                <i class="fa fa-folder"></i> {{ $event->category_list }}
                            </small> <br>

                            <small class="text-muted">
                                <i class="fa fa-tag"></i> {{ $event->tag_list }}
                            </small>
                        </td>
                        <td>
                            {!! nl2br($event->location_formatted) !!}
                        </td>
                        <td class="text-right">
                            {!! $event->price_formatted !!}
                        </td>
                        <td class="text-right">
                            {!! $event->size_formatted !!}
                        </td>
                        <td class="text-center">
                            {!! $event->created_at_formatted !!}
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