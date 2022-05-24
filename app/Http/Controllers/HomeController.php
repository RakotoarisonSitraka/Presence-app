<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function modifier(Request $request){        
          $users=user::find(Auth::user()->id);
            if($users){ 
                  $users->name=$request->input('name');
                  $users->email=$request->input('email');
                  //   $users->password=$request->input('password');
                  $users->save();
                 return redirect('/home'); 
 
           }else{
              return redirect()->back();

      }
    //     $users=User::find($id);
    //     $users->name=$request->input('name');
    //     $users->email=$request->input('email');
    //     $users->password=$request->input('password');
    //     $users->update();
    //    return redirect()->back();  

    }
    public function index()
    {
        $users= User::all();
        return view('home',compact('users'));
    }
}
