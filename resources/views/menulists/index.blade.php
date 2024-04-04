<div><a href="/">Home</a></div>
<a href="{{ route('menulists.create') }}">New Menulist</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>No.</td>
        <td>Type</td>
        <td>Name</td>
        <td>Description</td>
        <td>Price</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @forelse($menulists as $key => $menulist)
        <tr>
            <td>{{ $menulists->firstItem() + $key }}.</td>
            <td>{{ $menulist->menulist_name }}</td>
            <td>
                {{ $menulist->menutype->menutype_name }}
            </td>
            <td>{{ $menulist->itemdescription }}</td>
            <td>{{ $menulist->saleprice }}</td>
            <td>
                <a href="{{ route('menulists.edit', $menulist) }}">Edit</a>

                <form action="{{ route('menulists.delete', $menulist) }}" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No data found in table</td>
        </tr>
    @endforelse
    </tbody>
</table>
