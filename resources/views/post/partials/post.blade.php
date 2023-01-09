@if ($loop->odd)
    <div>{{ $key }}. {{ $post['title'] }}</div>
@else
    <div style="background: #eee">{{ $key }}. {{ $post['title'] }}</div>
@endif
<hr>
