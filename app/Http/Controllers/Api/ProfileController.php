<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Update the image of the token bearer from resource.
     */

     public function image(UserRequest $request)
     {
         $user = User::findOrfail($request->user()->id);

         if ( !is_null($user->image) ){
             Storage::disk('public')->delete($user->image);
         }

         $user->image = $request->file('image')->storePublicly('image', 'public');

         $user->save();

         return $user;
     }

    /**
     * Display the specified info of the token bearer resource.
     */
    public function show(Request $request)
    {
        return $request->user();
    }
}
