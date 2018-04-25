@extends('admin.layouts.master')

@section('content-title', 'ADVERTISEMENT')
@section('content-header', 'Advertisement List')

@section('content-body')
    @if ($advertisements->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Partner</th>
                    <th class="text-center">URL Target</th>
                    <th class="text-center" style="width: 120px;">Activated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $advertisement)
                    <tr>
                        <td class="text-center">
                            @if ($advertisement->featured_image)
                                <img src="{{ asset('storage/' . $advertisement->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            {{ $advertisement->partner->title }}
                        </td>
                        <td>
                            <a href="{{ $advertisement->url }}" target="_blank">
                                {{ $advertisement->url }}
                            </a>
                        </td>
                        <td class="text-center">
                            {{ $advertisement->activated_at_formatted }}
                        </td>
                        <td class="text-right">
                            <form method="post" action="{{ route('admin.partner.update', $advertisement) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
    
                                @if ($advertisement->activated_at)
                                    @component('common.buttons.submit')
                                        @slot('size', 'sm')
                                        @slot('color', 'warning')
                                        @slot('value', 'deactivate')
                                        @slot('text', 'Deactivate')
                                    @endcomponent
                                @else
                                    @component('common.buttons.submit')
                                        @slot('size', 'sm')
                                        @slot('color', 'info')
                                        @slot('value', 'activate')
                                        @slot('text', 'Activate')
                                    @endcomponent
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
