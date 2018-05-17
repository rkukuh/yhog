@extends('admin.layouts.master')

@section('content-title', 'PARTNER')
@section('content-header', 'Partner List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Partner')
            @slot('route', route('admin.partner.create'))
        @endcomponent
    </div>

    @if ($partners->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Partner Name</th>
                    <th class="text-center">Published</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Creator</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td class="text-center">
                            @if ($partner->featured_image)
                                <img src="{{ asset('storage/' . $partner->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <h5 style="font-size: 16px;">
                                <a href="#">
                                    {{ $partner->title }}
                                </a>
                            </h5>

                            <small class="text-muted">
                                <i class="fa fa-folder"></i> {{ $partner->category_link }}
                            </small> <br>

                            <small class="text-muted">
                                <i class="fa fa-tag"></i> {{ $partner->tag_list }}
                            </small>
                        </td>
                        <td class="text-center">
                            {{ $partner->published_at_formatted }}
                        </td>
                        <td class="text-center">
                            {{ $partner->created_at_formatted }}
                        </td>
                        <td>
                            {{ $partner->creator->name }} <br>

                            <span class="fa fa-envelope-o"></span>
                            <a href="mailto:{{ $partner->creator->email }}">
                                {{ $partner->creator->email }}
                            </a>
                        </td>
                        <td class="text-right">
                            <form method="post" action="{{ route('admin.partner.update', $partner) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
    
                                @if ($partner->published_at)
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
                                @slot('route', route('admin.partner.edit', $partner))
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.partner.destroy', $partner))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $partners->links() }}
        </div>
    @endif
@endsection
