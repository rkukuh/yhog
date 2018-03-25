@if ($post->likes->count())
    <div class="{{ $text_alignment or '' }}">
        <a href="#" data-toggle="modal" data-target="#post-{{ $post->id }}-likes">
            {{ number_format($post->likes->count()) }}
        </a>
    </div>
@else
    <div class="{{ $text_alignment or '' }}">
        <span class="text-{{ $no_like_color or 'danger' }}">
            {{ $no_like_text or 0 }}
        </span>
    </div>
@endif
