<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Menutype;

class MenulistController extends Controller
{
    //

    public function index()
    {
        return view('menulists.index', [
            'menulists' => Menulist::paginate(10)
        ]);
    }

    public function create()
    {
        $menutypes = Menutype::orderBy('menutype_name')->get();
        return view('menulists.create', compact('menutypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'menulist_name' => 'required|max:255',
           'itemdescription' => 'required|max:255',
           'saleprice' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/|gt:0',
           'menutype_id' => 'required|integer'
        ]);

        Menulist::create($data);

        return back()->with('message', 'Menulist created.');
    }

    public function edit(Menulist $menulist)
    {
        $menutypes = Menutype::orderBy('menutype_name')->get();
        return view('menulists.edit', compact('menulist', 'menutypes'));
    }

    public function update(Menulist $menulist, Request  $request)
    {
        $data = $request->validate([
            'menulist_name' => 'required|max:255',
           'itemdescription' => 'required|max:255',
           'saleprice' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/|gt:0',
           'menutype_id' => 'required|integer'
        ]);

        $menulist->update($data);

        return back()->with('message', 'Menulist updated.');
    }

    public function destroy(Menulist $menulist)
    {
        $menulist->delete();

        return back()->with('message', 'Menulist deleted.');
    }
}
