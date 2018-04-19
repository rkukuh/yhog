@extends('admin.layouts.master')

@section('content-title')
    DONATION <small>of Donation</small>
@endsection

@section('content-header', 'Donation List')

@section('content-body')
    <div style="margin-bottom: 60px;">
        @component('common.buttons.create-new')
            @slot('text', 'New Donation')
            @slot('route', route('admin.donation.create'))
        @endcomponent
    </div>

    @if ($donations->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Donation Title</th>
                    <th class="text-center">Target</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Deadline</th>
                    <th style="width: 120px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                    <tr>
                        <td class="text-center">
                            @if ($donation->featured_image)
                                <img src="{{ asset('storage/' . $donation->featured_image->path) }}" width="75px;">
                            @else
                                <div class="text-center">
                                    <i class="fa fa-picture-o fa-5x text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <h5 style="font-size: 16px;">
                                <a href="{{ route('admin.donation.show', $donation) }}">
                                    {{ $donation->title }}
                                </a>
                            </h5>

                            <small class="text-muted hide">
                                <i class="fa fa-folder"></i> {{ $donation->category_link }}
                            </small> <br>

                            <small class="text-muted hide">
                                <i class="fa fa-tag"></i> {{ $donation->tag_list }}
                            </small>
                        </td>
                        <td class="text-right">
                            {{ $donation->target_formatted }}
                        </td>
                        <td>
                            {{ $donation->description_limited }}
                        </td>
                        <td class="text-center">
                            {{ $donation->deadline }}
                        </td>
                        <td class="text-right">
                            @component('common.datalist.button-edit')
                                @slot('text', '')
                                @slot('route', route('admin.donation.edit', $donation))
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.donation.destroy', $donation))
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pull-right">
            {{ $donations->links() }}
        </div>
    @endif
@endsection
