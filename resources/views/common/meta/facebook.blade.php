@if (isset($post))
    <meta property="og:url"           content="{{ $post->social->open_graph_post_url or '' }}">
    <meta property="og:type"          content="article">
    <meta property="og:title"         content="{{ $post->social->open_graph_title or '' }}">
    <meta property="og:description"   content="{{ $post->social->open_graph_description or '' }}">
    <meta property="og:image"         content="{{ asset('/storage' . $post->featured_image) or '' }}">
@endif