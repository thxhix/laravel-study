@if ($loop->odd)
    <a href="/posts/{{ $post['id'] }}">
        <div>{{ $key }}. {{ $post['title'] }}</div>
    </a>
@else
    <a href="/posts/{{ $post['id'] }}">
        <div style="background: #eee">{{ $key }}. {{ $post['title'] }}</div>
    </a>
@endif
<hr>
