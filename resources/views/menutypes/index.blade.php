<div><a href="/">Home</a></div>
<a href="{{ route('menutypes.create') }}">New Menutype</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>No.</td>
        <td>Name</td>
        <td>Timestamp</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @forelse($menutypes as $key => $menutype)
        <tr>
            <td>{{ $menutypes->firstItem() + $key }}.</td>
            <td>{{ $menutype->menutype_name }}</td>
            <td>{{ $menutype->created_at->format('F d, Y') }}</td>
            <td>
                <a href="{{ route('menutypes.edit', $menutype) }}">Edit</a>

                <form action="{{ route('menutypes.delete', $menutype) }}" method="post">
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
