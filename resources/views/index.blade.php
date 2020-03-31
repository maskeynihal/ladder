<table>
    <tr>
        <th>S.N</th>
        <th>Is Root</th>
        <th>Parent</th>
        <th>Action</th>
    </tr>
    @foreach ($hierarchies as $item)
        <tr>
            <td> 
                <a href="{{route('ladder.show', $item->slug)}}">
                    {{ $item->title ?? '' }}
                </a> 
            </td>
            <td> {{ $item->description->root ?? '' }} </td>
            <td> {{ $item->myParent()->title ?? '' }} </td>
            <td>
                <a href="{{route('ladder.edit', $item->slug)}}"> EDIT</a>
            </td>
        </tr>
    @endforeach
</table>