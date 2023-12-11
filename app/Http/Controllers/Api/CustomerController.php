<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return CustomerResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'passwordConfirmation' => 'required|same:password'
        ]);
        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Customer Created Successfully.',
            'data' => new CustomerResource($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate Request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'role' => 'required',
            'address' => 'max:255'
        ]);

        $user->update($validatedData);

        return response()->json([
            'status' => 'Success',
            'message' => 'Customer Edited Successfully.',
            'data' => new CustomerResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Customer Deleted Successfully.'
        ]);
    }

    public function profile(User $user)
    {
        $user = auth()->user();
        return response()->json([
            'data' => new CustomerResource($user)
        ]);
    }

    public function editProfile(Request $request)
    {
        // Validate Request //
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'string',
            'address' => 'max:255'
        ]);

        $users = Auth::user();
        $findUser = User::find($users->id);
        $findUser->update($data);

        return response()->json([
            'status' => 'Success',
            'message' => 'Profile Edited Successfully.',
            'data' => $data
        ]);
    }
}
