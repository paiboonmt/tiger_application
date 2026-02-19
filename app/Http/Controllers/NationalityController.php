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
            'n_name' => 'required',
        ]);

        $nationality = new Nationality();
        $nationality->n_name = $request->n_name;
        $nationality->save();

        return redirect()->route('nationality.index');
    }

    public function edit($id)
    {
        $nationality = Nationality::findOrFail($id);
        return view('nationality.edit', compact('nationality'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'n_name' => 'required',
        ]);

        $nationality = Nationality::findOrFail($id);
        $nationality->n_name = $request->n_name;
        $nationality->save();

        return redirect()->route('nationality.index');
    }

    public function destroy($id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();
        return redirect()->route('nationality.index');
    }
}
