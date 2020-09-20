<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function uplaodAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'image uploaded'); //success
        }
        return redirect()->back()->with('error', 'image not uploaded'); //error
    }



    public function index()
    {
        $data = [
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => 'password',
        ];

        // User::create($data);
        // $user = new User();
        // $user->name = 'kathak';
        // $user->email = 'kathak@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        $user = User::all();
        return $user;

        // User::where('id', 3)->delete();

        // User::where('id', 4)->update(['name' => 'anskhannnnnn']);
        // $user = User::all();
        // return $user;



        // DB::insert('INSERT INTO users (name, email, password) VALUES (?,?,?)', [
        //     'Anskhan', 'ans@gmail.com', 'password',
        // ]);

        // $result = DB::select('SELECT * FROM users');
        // return $result;

        // DB::update('UPDATE users SET name = ? WHERE id = 1', ['asfand']);

        // DB::delete('delete from users');
        // $result = DB::select('select * from users');
        // return $result;
        // return view('Users');
    }
}
