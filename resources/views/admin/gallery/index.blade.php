@extends('admin.layouts.master')

@section('content-title')
    GALLERY <small>of Gallery</small>
@endsection

@section('content-header', 'Gallery List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Gallery')
            @slot('route', route('admin.gallery.create'))
        @endcomponent
    </div>

    @if ($galleries->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Post Title</th>
                    <th class="text-center">Published</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Author</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td class="text-center">
                            @if ($gallery->featured_image)
                                <img src="{{ asset('storage/' . $gallery->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <h5 style="font-size: 16px;">
                                <a href="{{ route('admin.gallery.show', $gallery) }}">
                                    {{ $gallery->title }}
                                </a>
                            </h5>

                            <small class="text-muted">
                                <i class="fa fa-folder"></i> {{ $gallery->category_link }}
                            </small> <br>

                            <small class="text-muted">
                                <i class="fa fa-tag"></i> {{ $gallery->tag_list }}
                            </small>
                        </td>
                        <td class="text-center">
                            {{ $gallery->created_at_formatted }}
                        </td>
                        <td>
                            {{ $gallery->creator->name }} <br>

                            <span class="fa fa-envelope-o"></span>
                            <a href="mailto:{{ $gallery->creator->email }}">
                                {{ $gallery->creator->email }}
                            </a>
                        </td>
                        <td class="text-right">
                            <form method="post" action="{{ route('admin.gallery.update', $gallery) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
    
                                @if ($gallery->published_at)
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
                                @slot('route', route('admin.gallery.edit', $gallery))
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.gallery.destroy', $gallery))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $galleries->links() }}
        </div>
    @endif
@endsection
