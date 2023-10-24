<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    function submit(Request $request){
        $validator = $request->validate([
            'name'=>'required|string',
            'email'=>'required',
            'password'=> 'required',
        ]);
        
        User::create($request->all());
        return response("User Registerd Successfully",200);
    }


    function showUser(){
        $user=User::all();
        return response()->json($user);
    }
}
