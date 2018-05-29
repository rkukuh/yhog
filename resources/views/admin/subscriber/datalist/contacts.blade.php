@if ($contacts->isEmpty())
    @include('common.datalist.no-data')
@else
    <table id="table" class="table table-bordered table-striped table-hover table-leveled">
        <thead>
            <tr>
                <th class="text-center" style="width: 250px;">Name / Email</th>
                <th class="text-center">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>
                        {{ $contact->name }} <br>

                        <i class="fa fa-envelope"></i> 
                        <a href="mailto:{{ $contact->email }}">
                            {{ $contact->email }}
                        </a> 
                    </td>
                    <td>
                        <span>
                            {{ $contact->message }} 
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">
        {{ $contacts->links() }}
    </div>
@endif