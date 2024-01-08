<?php

namespace App\Http\Controllers\Api;

use App\Models\Pendaftaran;
use App\Models\Jadwal;
use App\Models\Midtrans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PendaftaranResource;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->get();

        return PendaftaranResource::collection($pendaftarans);
    }

    public function userRegist()
    {
        return PendaftaranResource::collection(Pendaftaran::where('user_id', auth()->user()->id)->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'berat' => 'required|integer',
            'tinggi' => 'required|integer',
            'usia' => 'required|integer',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor' => 'required|min:8|max:14|regex:/^([0-9\s\-\+\(\)]*)$/',
            'olahraga' => 'required|string',
            'cabang' => 'required|string',
            'cedera' => 'integer',
            'penyebab' => 'required|string|max:255',
            'lama_cedera' => 'required|string',
            'jumlah_terapi' => 'required|string',
        ]);
        $validatedData['user_id'] = auth()->id();

        $pendaftaran = Pendaftaran::create($validatedData);
        $pendaftaran->cederas()->attach($request->cederas);

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil melakukan pendaftaran, Silahkan menunggu konfirmasi',
            'data' => $pendaftaran,
            'cedera' => $request->cederas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return response()->json([
            'data' => new PendaftaranResource($pendaftaran),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // Validate Request
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'berat' => 'required|integer',
            'tinggi' => 'required|integer',
            'usia' => 'required|integer',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor' => 'required|min:8|max:14|regex:/^([0-9\s\-\+\(\)]*)$/',
            'olahraga' => 'required|string',
            'cabang' => 'required|string',
            'cedera' => 'integer',
            'penyebab' => 'required|string|max:255',
            'lama_cedera' => 'required|string',
            'jumlah_terapi' => 'required|string',
            'status_pendaftaran' => 'integer'
        ]);
        $validatedData['user_id'] = auth()->id();

        $pendaftaran->cederas()->sync($request->cederas);
        $pendaftaran->update($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Pendaftaran Updated Successfully',
            'data' => $pendaftaran
        ]);
    }

    public function addJadwal(Request $request, Pendaftaran $pendaftaran)
    {
        $validatedData = $request->validate([
            'jadwal_id' => 'required|integer',
        ]);

        $pendaftaran->jadwal()->attach($validatedData['jadwal_id']);
        $jadwal = Jadwal::findOrFail($validatedData['jadwal_id']);
        $jadwal->update([
            'tersisa' => $jadwal->tersisa - 1
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil Memilih Jadwal',
            'data' => new PendaftaranResource($pendaftaran),
            'jadwal' => Jadwal::findOrFail($validatedData['jadwal_id'])
        ]);
    }

    public function editJadwal(Request $request, Pendaftaran $pendaftaran)
    {
        $validatedData = $request->validate([
            'jadwal_id' => 'required|integer',
        ]);

        $oldJadwal = $pendaftaran->jadwal()->first();
        if ($oldJadwal) {
            $oldJadwal->update([
                'tersisa' => $oldJadwal->tersisa + 1
            ]);
        }

        $pendaftaran->jadwal()->sync($validatedData['jadwal_id']);

        $newJadwal = Jadwal::findOrFail($validatedData['jadwal_id']);
        $newJadwal->update([
            'tersisa' => $newJadwal->tersisa - 1
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil Mengubah Jadwal',
            'data' => new PendaftaranResource($pendaftaran),
            'jadwal' => Jadwal::findOrFail($validatedData['jadwal_id'])
        ]);
    }

    public function verification(Pendaftaran $pendaftaran)
    {
        $pendaftaran->update([
            'status_pendaftaran' => 1
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil Memverifikasi Pendaftaran',
            'data' => $pendaftaran
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->cederas()->detach();
        $pendaftaran->jadwal()->detach();
        $pendaftaran->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Pendaftaran Deleted Successfully'
        ]);
    }
}
