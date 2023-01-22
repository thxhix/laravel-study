<input class="post-form__input" type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}">
<textarea class="post-form__textarea" name="content" cols="30" rows="10">{{ old('content', optional($post ?? null)->content) }}</textarea>

@if ($errors->all())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<button class="post-form__submit" type="submit">{{ $button_text }}</button>
