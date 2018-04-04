@extends('admin.layouts.master')

@section('content-title')
    POST <small>of Blog</small>
@endsection

@section('content-header', 'Blog Post List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Post')
            @slot('route', route('admin.post.create'))
        @endcomponent
    </div>

    @if ($posts->isEmpty())
        @component('common.datalist.no-data')
            @slot('text', 'No blog post yet. Be the first to publish!')
        @endcomponent
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Creator</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Published</th>
                    <th style="width: 180px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <h5 style="font-size: 16px;">
                                <span class="text-muted">Title: </span>

                                <a href="{{ route('admin.post.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </h5>

                            <small class="text-muted">
                                Categories: {{ $post->category_list }}
                            </small> <br>

                            <small class="text-muted">
                                Tags: {{ $post->tag_list }}
                            </small>
                        </td>
                        <td>
                            {{ $post->author->name }} <br>

                            <span class="fa fa-envelope-o"></span>
                            <a href="mailto:{{ $post->author->email }}">
                                {{ $post->author->email }}
                            </a>
                        </td>
                        <td class="text-center">
                            {!! $post->created_at_formatted !!}
                        </td>
                        <td class="text-center">
                            {!! $post->published_at_formatted !!}
                        </td>
                        <td class="text-right">
                            <form method="post" action="{{ route('admin.post.update', $post) }}" style="display: inline;">
                                @method('PATCH')
                                @csrf
    
                                @if ($post->published_at)
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
                                @slot('route', route('admin.post.edit', $post))
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.post.destroy', $post))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
