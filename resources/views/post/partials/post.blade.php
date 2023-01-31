@if ($loop->odd)


    <div class="post-list-container__item post-list-container__item--odd">
        <div class="post-block">
            <a href="/posts/{{ $post['id'] }}" class="post-block-left">
                <span class="post-block-left__id">#{{ $post['id'] }}</span>
                |
                <span class="post-block-left__title">{{ $post['title'] }}</span>
            </a>

            <div class="post-block-right">
                @if ($post->comments_count)
                    <span style="margin-right:30px">Отзывы: {{ $post->comments_count }}</span>
                @else
                    <span style="margin-right:30px">Нет отзывов!</span>
                @endif
                <a href="/posts/{{ $post['id'] }}/edit" class="post-block-right__action">
                    <span title="Редактировать">✏️</span>
                </a>
            </div>
        </div>
    </div>
@else
    <div class="post-list-container__item post-list-container__item--even">
        <div class="post-block">
            <a href="/posts/{{ $post['id'] }}" class="post-block-left">
                <span class="post-block-left__id">#{{ $post['id'] }}</span>
                |
                <span class="post-block-left__title">{{ $post['title'] }}</span>
            </a>

            <div class="post-block-right">
                @if ($post->comments_count)
                    <span style="margin-right:30px">Отзывы: {{ $post->comments_count }}</span>
                @else
                    <span style="margin-right:30px">Нет отзывов!</span>
                @endif
                <a href="/posts/{{ $post['id'] }}/edit" class="post-block-right__action">
                    <span title="Редактировать">✏️</span>
                </a>
            </div>
        </div>
    </div>
@endif
