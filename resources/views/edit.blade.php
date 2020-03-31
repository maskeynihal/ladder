
@if ($errors->any() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('ladder.update', $ladder->slug)}}" method="post">
    @method('PUT')
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title', $ladder->title) }}">
    <label for="parent_id">Parent</label>
    <select name="parent_id" id="">
        @foreach ($hierarchies as $hierarchy_id=> $title)
            <option value="{{ $hierarchy_id }}" {{old('parent_id', $ladder->description->parent_id ?? '') == $hierarchy_id ? 'selected' : ''}}> {{$title}}</option>
        @endforeach
    </select>

    <button type="submit">Add</button>
</form>