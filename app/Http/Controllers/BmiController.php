<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyMassIndex;

class BmiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|unique:body_mass_indexes',
            'name' => 'required',
            'height' => 'required|integer',
            'weight' => 'required|integer',
        ], [
            'phone.unique' => 'Nomor HP Anda Sudah Terdaftar'
        ]);

        $validated['result_value'] = ($validated['height'] * $validated['height']) / $validated['weight'];
        $result = '';
        if ($validated['result_value'] < 17) {
            $result = "Sangat Kurus";
        } else if ($validated['result_value'] >= 17 && $validated['result_value'] <= 18.5) {
            $result = "Kurus";
        } else if ($validated['result_value'] >= 18.5 && $validated['result_value'] <= 25) {
            $result = "Normal";
        } else if ($validated['result_value'] >= 25 && $validated['result_value'] <= 27) {
            $result = "Gemuk";
        } else if ( $validated['result_value'] >= 27) {
            $result = "Obesitas";
        }
        $validated['result_name'] = $result;
        BodyMassIndex::insert($validated);

        return redirect()->route('bmi.index')->with('result', $result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
