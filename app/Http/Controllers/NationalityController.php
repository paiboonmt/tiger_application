<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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

        // dd($request->all());


        $request->validate([
            'n_name' => 'required',
        ]);

        DB::table('tb_nationality')->insert([
            'n_name' => $request->n_name,
        ]);


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

        $data = DB::table('tb_nationality')
            ->where('nationality_id', $id)
            ->update([
                'n_name' => $request->n_name,
            ]);

        // $nationality = Nationality::findOrFail($id);
        // $nationality->n_name = $request->n_name;
        // $nationality->save();

        return redirect()->route('nationality.index')->with('success', 'Nationality updated successfully.');
    }

    public function destroy($id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();
        return redirect()->route('nationality.index');
    }
}
