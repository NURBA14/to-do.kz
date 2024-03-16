<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view("worker.profile.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255|string",
            "avatar" => "nullable|image"
        ]);
        $user = User::find(Auth::user()->id);
        if($request->avatar) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $folder = date("Y-m-d");
            $avatar = $request->file("avatar")->store("avatar/{$folder}");
        } else {
            $avatar = $user->avatar;
        }
        $user->update([
            "name" => $request->name,
            "avatar" => $avatar
        ]);
        session()->flash("success", "Changes is saved");
        return redirect()->back();
    }


    public function destroy(Auth $user)
    {
        $user = User::find(Auth::user()->id);
        if($user->avatar){
            Storage::delete($user->avatar);
        }
        $user->avatar = null;
        $user->save();
        session()->flash("success", 'Avatar is deleted');
        return redirect()->back();
    }

}
