<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menutype;

class MenutypeController extends Controller
{
    //

    public function index()
    {
        return view('menutypes.index', [
            'menutypes' => Menutype::paginate()
        ]);
    }

    public function create()
    {
        return view('menutypes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'menutype_name' => 'required|max:255'
        ]);

        Menutype::create($data);

        return back()->with('message', 'Menutype created successfully');
    }

    public function edit(Menutype $menutype)
    {
        return view('menutypes.edit', compact('menutypes'));
    }

    public function update(Menutype $menutype, Request $request)
    {
        $data = $request->validate([
            'menutype_name' => 'required|max:255'
        ]);

        $menutype->update($data);

        return back()->with('message', 'Menutype updated.');
    }

    public function destroy(Menutype $menutype)
    {
        $menutype->delete();

        return back()->with('message', 'Menutyp deleted.');
    }
}
