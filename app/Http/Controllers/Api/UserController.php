<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findorfail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();

        $user = User::findorfail($id);

        $user->name = $validated['name'];

        $user->save();

        return $user;
    }



    public function email(UserRequest $request, string $id)
    {
        $user = User::findOrfail($id);

        $validated = $request->validated();

        $user->email = $validated['email'];

        $user->save();

        return $user;
    }

    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrfail($id);

        $validated = $request->validated();

        $user->password = Hash::make($validated['passwordd']);

        $user->save();

        return $user;
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return $user;
    }


    /**
     * Update the image of the specified resource from storage.
     */

    public function image(UserRequest $request, string $id)
    {
        $user = User::findOrfail($id);

        if ( !is_null($user->image) ){
            Storage::disk('public')->delete($user->image);
        }

        $user->image = $request->file('image')->storePublicly('image', 'public');

        $user->save();

        return $user;
    }
}
