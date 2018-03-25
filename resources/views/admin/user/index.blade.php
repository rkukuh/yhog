@extends('admin.layouts.master', [
    'left_content_size' => 5,
    'right_content_size' => 3,
])

@section('content-title', 'USER')
@section('content-alt-header', 'User List')

@section('content-alt-body')
    @if ($users->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('user.show', $user) }}">{{ $user->name }}</a>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td class="text-right">
                            @component('common.datalist.button-edit')
                                @slot('text', '')
                                @slot('route', route('user.edit', [
                                                        $user,
                                                        'page' => $_GET['page'] ?? 1
                                                     ]
                                               )
                                )
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('user.destroy', $user))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $users->links() }}
        </div>
    @endif
@endsection

