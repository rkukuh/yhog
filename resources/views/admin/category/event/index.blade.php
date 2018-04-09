@extends('admin.layouts.master', [
    'left_content_size'  => 4,
    'right_content_size' => 3,
])

@section('content-title')
    EVENT CATEGORY <small>of Event</small>
@endsection

@section('content-alt-header', 'Event Category List')

@section('content-alt-body')
    @if ($categories->isEmpty())
        @include('common.datalist.no-data')
    @else
        <table id="table" class="table table-bordered table-striped table-hover table-leveled">
            <thead>
               <tr>
                   <th class="text-left">Name</th>
                   <th width="100"></th>
               </tr>
           </thead>
           <tbody>
                @foreach ($categories as $categoryLv1)
                    <tr class="level-1">
                        <td class="leveled">{{ $categoryLv1->name }}</td>
                        <td class="text-right">
                            @component('common.datalist.button-edit')
                                @slot('text', '')
                                @slot('route', route('admin.category-event.edit', [
                                                        $categoryLv1,
                                                        'page' => $_GET['page'] ?? 1
                                                     ]
                                               )
                                )
                            @endcomponent

                            @component('common.datalist.button-remove')
                                @slot('text', '')
                                @slot('route', route('admin.category-event.destroy', $categoryLv1))
                            @endcomponent
                        </td>
                    </tr>
                    @foreach ($categoryLv1->childs as $categoryLv2)
                        <tr class="level-2">
                            <td class="leveled">{{ $categoryLv2->name }}</td>
                            <td class="text-right">
                                @component('common.datalist.button-edit')
                                    @slot('text', '')
                                    @slot('route', route('admin.category-event.edit', [
                                                            $categoryLv2,
                                                            'page' => $_GET['page'] ?? 1
                                                         ]
                                                   )
                                    )
                                @endcomponent

                                @component('common.datalist.button-remove')
                                    @slot('text', '')
                                    @slot('route', route('admin.category-event.destroy', $categoryLv2))
                                @endcomponent
                            </td>
                        </tr>
                        @foreach ($categoryLv2->childs as $categoryLv3)
                            <tr class="level-3">
                                <td class="leveled">{{ $categoryLv3->name }}</td>
                                <td class="text-right">
                                    @component('common.datalist.button-edit')
                                        @slot('text', '')
                                        @slot('route', route('admin.category-event.edit', [
                                                                $categoryLv3,
                                                                'page' => $_GET['page'] ?? 1
                                                             ]
                                                       )
                                        )
                                    @endcomponent

                                    @component('common.datalist.button-remove')
                                        @slot('text', '')
                                        @slot('route', route('admin.category-event.destroy', $categoryLv3))
                                    @endcomponent
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

@section('content-alt-form')
    @include('admin.category.event._form')
@endsection