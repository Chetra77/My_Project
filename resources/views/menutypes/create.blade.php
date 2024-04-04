<div style="margin-bottom: 1em;">
    <a href="{{ route('menutypes.index') }}">Menutype List</a>
</div>

<h1>Create Menutype</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('menutypes.create') }}" method="post">
    @csrf
    <div style="margin-bottom: 1em;">
        <label for="menutype_name">Name</label>
        <input type="text" name="menutype_name" id="menutype_name" placeholder="Enter menutype">
        @error('menutype_name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
