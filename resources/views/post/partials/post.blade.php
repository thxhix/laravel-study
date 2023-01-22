@if ($loop->odd)
    <a class="post-list-container__item post-list-container__item--odd" href="/posts/{{ $post['id'] }}">
        <div>#{{ $post['id'] }} | {{ $post['title'] }}</div>
    </a>
@else
    <a class="post-list-container__item post-list-container__item--even" href="/posts/{{ $post['id'] }}">
        <div>#{{ $post['id'] }} | {{ $post['title'] }}</div>
    </a>
@endif
