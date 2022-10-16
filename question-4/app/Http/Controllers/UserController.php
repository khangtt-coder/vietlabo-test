<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where("user_name", "=", "khangtran86")->firstOrFail();
        return response()->json(["data" => $user]);
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->validated());
        return response()->json(["message" => "register successfully"]);
    }

    public function show($username)
    {
        $user = User::where("user_name", "=", $username)->firstOrFail();
        return response()->json(["data" => $user]);
    }

    public function update(UpdateUserRequest $request ,$username)
    {
        $request->validated();
        $user = User::where("user_name", "=", $username)->firstOrFail();

        if (Hash::check($request->input("password"), $user->password)) {
            $user->email = $request->input('email');
            $user->about_me = $request->input('about_me');
            $user->fullname = $request->input('fullname');
            $user->phone_number = $request->input('phone_number');

            return response()->json(["data" => $user]);
        }

        return response()->json(["errors" => ["password" => ["The password is not correct"]]], 422);
    }

    public function uploadAvatar(Request $request, $username)
    {
        $user = User::where("user_name", "=", $username)->firstOrFail();

        if (Hash::check($request->input("password"), $user->password)) {
            if($image = $request->get('image')) {
                $name = time() .'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                \Image::make($image)->save(public_path('avatar/') . $name);

                $user->avatar = "/avatar/" . $name;
                $user->save();
            }

            return response()->json(['success' => 'You have successfully uploaded an avatar'], 200);
        }

        return response()->json(["errors" => ["password" => ["The password is not correct"]]], 422);
    }
}
