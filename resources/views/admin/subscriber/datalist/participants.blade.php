@if ($participants->isEmpty())
    @include('common.datalist.no-data')
@else
    <table id="table" class="table table-bordered table-striped table-hover table-leveled">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Bought / Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>
                        {{ $participant->full_name }} <br>

                        on 
                        <small class="text-muted">
                            <a href="{{ route('admin.event.show', $participant->event) }}">
                                {{ $participant->event->name }}
                            </a>
                        </small>
                    </td>
                    <td>
                        <i class="fa fa-envelope"></i> 
                        <a href="mailto:{{ $participant->email }}">
                            {{ $participant->email }}
                        </a> 
                        
                        <br>
                        
                        <i class="fa fa-phone"></i> 
                        {{ $participant->phone }}
                    </td>
                    <td class="text-right">
                        <span>
                            {{ $participant->quantity }} 

                            <small class="text-muted">
                                {{ str_plural('ticket', $participant->quantity) }}
                            </small> 

                            <br>

                            {{ number_format($participant->price * $participant->quantity) }} 

                            <small class="text-muted">IDR</small>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">
        {{ $participants->links() }}
    </div>
@endif