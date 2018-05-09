@extends('admin.layouts.master', [
    'left_content_size'  => 4,
    'right_content_size' => 3,
])

@section('content-title', 'TAG')
@section('content-alt-header', 'Tag List')

@section('content-alt-body')
    @if ($tags->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            <a href="{{ route('admin.tag.show', $tag) }}">{{ $tag->name }}</a>
                        </td>
                        <td class="text-right">
                            @component('common.datalist.button-edit')
                                @slot('text', '')
                                @slot('route', route('admin.tag.edit', [
                                                        $tag,
                                                        'page' => $_GET['page'] ?? 1
                                                     ]
                                               )
                                )
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.tag.destroy', $tag))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $tags->links() }}
        </div>
    @endif
@endsection

@section('content-alt-form')
    @include('admin.tag._form')
@endsection
