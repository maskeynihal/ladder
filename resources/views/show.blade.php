<ul>
    <li>
        <strong>Title:</strong>
        {{$ladder->title ?? ''}}
    </li>

    <li>
        <strong>Root:</strong>
        {{$ladder->description->root  ?? ''}}
    </li>
</ul>

<ul>
    @foreach ($tree as $item)
        <li>
            {{$item['title']}}    
        </li>
    @endforeach
</ul>
