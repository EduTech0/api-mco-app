<?php

namespace App\Http\Controllers\Api;

use App\Models\Cedera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CederaResource;

class CederaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cederas = Cedera::latest()->get();

        return CederaResource::collection($cederas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request
        $validatedData = $request->validate([
            'image' => 'image|file|max:2048',
            'name' => 'required|string|max:255',
            'harga' => 'required|integer'
        ]);
        // Request Image
        if ($request->hasFile('image')) {
            $newImage = $request->image->getClientOriginalName();
            $request->image->storeAs('public/cederas', $newImage);
            $data['image'] = $newImage;
        }

        $cedera = Cedera::create($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Cedera Created Successfully.',
            'data' => $cedera
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cedera = Cedera::findOrFail($id);

        return response()->json([
            'data' => new CederaResource($cedera)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cedera $cedera)
    {
        // Validate Request
        $validatedData = $request->validate([
            'image' => 'max:2048',
            'name' => 'required|string|max:255',
            'harga' => 'required|integer'
        ]);
        // Request Image
        if ($request->hasFile('image')) {
            $newImage = $request->image->getClientOriginalName();
            $request->image->storeAs('public/cederas', $newImage);
            $data['image'] = $newImage;
        }

        $cedera->update($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Cedera Updated Successfully.',
            'data' => $cedera
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cedera $cedera)
    {
        $cedera->pendaftarans()->detach();
        $cedera->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Cedera Deleted Successfully.'
        ]);
    }
}
