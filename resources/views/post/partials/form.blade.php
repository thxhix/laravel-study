<input type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}">
<textarea name="content" cols="30" rows="10">{{ old('content', optional($post ?? null)->content) }}</textarea>

@if ($errors->all())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
