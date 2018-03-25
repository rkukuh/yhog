<form action="{{ route('post-like.update', $data) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <button type="submit">
        @if ($data->likes->count())
            <i class="fa fa-heart fa-lg"></i>
            {{ $data->likes->count() }}
        @else
            <i class="fa fa-heart-o fa-lg"></i>
        @endif
    </button>
</form>