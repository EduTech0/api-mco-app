<?php

namespace App\Http\Controllers\Api;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JadwalResource;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::latest()->get();

        return JadwalResource::collection($jadwals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_1' => 'required',
            'waktu_2' => 'required',
            'kuota' => 'required|integer',
        ]);
        $validatedData['tersisa'] = $request->kuota;

        $jadwal = Jadwal::create($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Jadwal Created Successfully.',
            'data' => new JadwalResource($jadwal)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return response()->json([
            'data' => new JadwalResource($jadwal)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        // Validate Request
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_1' => 'required',
            'waktu_2' => 'required',
            'kuota' => 'required|integer',
            'tersisa' => 'required|integer',
        ]);

        $jadwal->update($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Jadwal Updated Successfully.',
            'data' => new JadwalResource($jadwal)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Jadwal Deleted Successfully.'
        ]);
    }
}
