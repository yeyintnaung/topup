<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
                        $this->middleware('lock');

    }

    public function index()
    {
        //
        $users = User::all();
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $this->validate($request,[
            'name'       => 'required',
            'email'      => 'required',
            'password'   => 'required',
            'role'       => 'required',
        ]);


        /*topup record placed to save*/
        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);
        $user->show_pass    = $request->password;
        $user->role         = $request->role;


        if($user->save()){
            /* saved record in history table if topup record saved. */
            /*$history = new History;
            $history->user        = $request->user;
            $history->card        = $request->card;
            $history->amount      = $price;
            $history->code        = $code;
            $history->status      = 'create';
            $history->format      = date('Y-m-d');
            $history->description = ' have been created ';
            $history->save();*/

            /*redirected url to topup if record saved successful*/
            return redirect('user')->with('message','User have been created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return view('404');
        }
        return view('user.view',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request)
    {
        //
        $input=Input::except('_token');
        $validator=Validator::make($input,[
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email,'.$input['id'],
            'show_pass'   => 'required',
            'role'       => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $input['password']=bcrypt($input['show_pass']);
        DB::table('users')->where('id',$request->id)->update($input);
        return redirect()->back()->with('message','successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        User::destroy($id);
        return redirect()->back()->with('message', 'Successfully deleted');
    }
    
        public function search(Request $request)
    {
        //
        $id= $request->id;
        $date = $request->date;
        
         $user = User::find($id);
        
        if(!$user){
            return view('404');
        }
        return view('user.result',['user'=>$user,'date'=>$date,'uid'=>$id]);

    }
}
