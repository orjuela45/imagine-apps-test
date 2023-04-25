<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
      $users = User::all();
      return view("users.index", ["users" => $users]);
    }
    
    public function create(){
      return view("users.create");
    }
    
    public function store(Request $request){
      if (trim($request->name) == '') {
        return response("The name is required", 401);
      }
      if (trim($request->email) == '') {
        return response("The email is required", 401);
      }
      if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        return response("Invalid email format", 401);
      }
      if (trim($request->password) == '') {
        return response("The password is required", 401);
      }

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;

      $user->save();
      return response("User created");
    }
}
