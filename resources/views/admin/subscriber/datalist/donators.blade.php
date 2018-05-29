@if ($donators->isEmpty())
    @include('common.datalist.no-data')
@else
    <table id="table" class="table table-bordered table-striped table-hover table-leveled">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Donation Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donators as $donator)
                <tr>
                    <td>
                        {{ $donator->full_name }} <br>

                        on 
                        <small class="text-muted">
                            <a href="{{ route('admin.donation.show', $donator->donation) }}">
                                {{ $donator->donation->title }}
                            </a>
                        </small>
                    </td>
                    <td>
                        <i class="fa fa-envelope"></i> 
                        <a href="mailto:{{ $donator->email }}">
                            {{ $donator->email }}
                        </a> 
                    </td>
                    <td class="text-right">
                        <span>
                            {{ $donator->amount_formatted }} 
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">
        {{ $donators->links() }}
    </div>
@endif