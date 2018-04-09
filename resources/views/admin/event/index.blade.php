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
                    <th class="text-center">Creator</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Published</th>
                    <th style="width: 180px;"></th>
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
                            {{ $event->creator->name }} <br>

                            <span class="fa fa-envelope-o"></span>
                            <a href="mailto:{{ $event->creator->email }}">
                                {{ $event->creator->email }}
                            </a>
                        </td>
                        <td class="text-center">
                            {!! $event->created_at_formatted !!}
                        </td>
                        <td class="text-center">
                            {!! $event->published_at_formatted !!}
                        </td>
                        <td class="text-right">
                            <form method="post" action="{{ route('admin.event.update', $event) }}" style="display: inline;">
                                @method('PATCH')
                                @csrf
    
                                @if ($event->published_at)
                                    @component('common.buttons.submit')
                                        @slot('size', 'sm')
                                        @slot('color', 'warning')
                                        @slot('value', 'draft')
                                        @slot('text', 'Set as Draft')
                                    @endcomponent
                                @else
                                    @component('common.buttons.submit')
                                        @slot('size', 'sm')
                                        @slot('color', 'info')
                                        @slot('value', 'publish')
                                        @slot('text', 'Publish Now')
                                    @endcomponent
                                @endif
                            </form>

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
