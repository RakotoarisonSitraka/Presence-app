<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
  }
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


    /* function manao mise a jour ilay password*/
    public function UpdatePassword(Request $request)
     {
      //  dd(Session::all());
     
      // dd($request->all());
      /*validation   return redirect()->route('your route');*/
      
     
      /*match the old Password*/
      #Update the new password



     }

  
}
