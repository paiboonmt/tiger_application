<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::all();
        return view('nationality.index', compact('nationalities'));
    }

    public function create()
    {
        return view('nationality.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $nationality = new Nationality();
        $nationality->name = $request->name;
        $nationality->save();

        return redirect()->route('nationality.index')->with('success', 'Nationality created successfully');
    }

    public function edit($id)
    {
        $nationality = Nationality::findOrFail($id);
        return view('nationality.edit', compact('nationality'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $nationality = Nationality::findOrFail($id);
        $nationality->name = $request->name;
        $nationality->save();

        return redirect()->route('nationality.index')->with('success', 'Nationality updated successfully');
    }

    public function destroy($id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();

        return redirect()->route('nationality.index')->with('success', 'Nationality deleted successfully');
    }
}
