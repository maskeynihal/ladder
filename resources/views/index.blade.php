<table>
    <th>S.N</th>
    <th>Is Root</th>
    <th>Parent</th>
    @foreach ($hierarchies as $item)
        <td> {{ $item->title ?? '' }} </td>
        <td> {{ $item->description->is_root ?? '' }} </td>
        <td> {{ $item->myParent()->title ?? '' }} </td>
    @endforeach
</table>