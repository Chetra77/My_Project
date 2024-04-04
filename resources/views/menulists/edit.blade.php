<div style="margin-bottom: 1em;">
    <a href="{{ route('menulists.index') }}">Product List</a>
</div>

<h1>Edit Product</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('menulists.edit', $menulist) }}" method="post">
    @csrf
    <div style="margin-bottom: 1em;">
        <label for="menulist_name">Name</label>
        <input type="text" name="menulist_name" id="menulist_name" placeholder="Enter menulist" value="{{ $menulist->menulist_name }}">
        @error('menulist_name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="menutype_id">Category</label>
        <select name="menutype_id" id="menutype_id">
            <option value="">Select</option>
            @foreach($menutypes as $menutype)
            <option
            @if ($menutype->id === (int)$menulist->menutype_id)
            selected
            @endif
            value="{{ $menutype->id }}">{{ $menutype->menutype_name }}</option>
            @endforeach
        </select>
        @error('menutype_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="itemdescription">Description</label>
        <input type="text" name="itemdescription" id="itemdescription" placeholder="Enter description"
               value="{{ $menulist->itemdescription }}">
        @error('itemdescription')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="saleprice">Price</label>
        <input type="text" name="saleprice" id="saleprice" placeholder="Enter price" value="{{ $menulist->saleprice }}">
        @error('saleprice')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
