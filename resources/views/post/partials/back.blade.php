@if (Route::is('posts.show'))
    <div class="post-detail__back back">
        <a href="{{ route('posts.index', []) }}">Вернуться назад</a>
    </div>
@else
    <div class="post-detail__back back">
        <a href="{{ url()->previous() }}">Вернуться назад</a>
    </div>
@endif
