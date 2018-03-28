@extends('admin.layouts.master')

@section('content-title')
    POST <small>of Blog</small>
@endsection

@section('content-header', 'Blog Post List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Post')
            @slot('route', route('post.create'))
        @endcomponent
    </div>

    @if ($posts->isEmpty())
        @component('common.datalist.no-data')
            @slot('text', 'No blog post yet. Be the first to publish!')
        @endcomponent
    @endif
@endsection
