
<form action="{{route('ladder.store')}}" method="post">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" value={{old('title','')}} >
    <label for="parent">Parent</label>
    <select name="parent" id="">
        @foreach ($hierarchies as $item)
            <option value="{{$item->hierarchy_id}}" {{old('parent') == $item->hierarchy_id ? 'selected' : ''}}> {{$item->title}}</option>
        @endforeach
    </select>
    <label for="is_root">Is Root</label>
    <input type="radio" name="is_root" id="" {{old('is_root','')}}> <span> Yes </span>
</form>