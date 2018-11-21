<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //create new user
        public function add(Request $request){
            $request['api_token']=str_random(60);
            $request['password']=app('hash')->make($request['password']);
            $user=User::create($request->all());

            return response()->json($user);
        }
    // update user
        public function edit(Request $request,$id){
            $user=User::find($id);
            $user->update($request->all());

            return response()->json($user);
        }

}