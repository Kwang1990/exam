<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    //
    public function index(){
    	// dd(route('user.index'));
    	$users = User::all();
    	return view('admin.user.index',[
    		'users'=>$users
    	]);

    }
    public function detail($id){
    	return view('admin.user.detail');
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = $allRequest['password'];
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];
        $dataInsertToDatabase = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
        );
        $objUser = new User();
        $objUser->insert($dataInsertToDatabase);
        return redirect()->action('userController@index');
    }
    public function edit($id){
        $objUser = new User();
        $getUserById = $objUser->find($id)->toArray();
        return view('admin.user.edit')->with('getUserById',$getUserById);
    }
    public function update(Request $request){
        $allRequest = $request->all();
        $id = $allRequest['id'];
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = $allRequest['password'];
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];

        $objUser = new User();
        $getUserById  = $objUser->find($id);
        $getUserById->name = $name;
        $getUserById->email = $email;
        $getUserById->password = $password;
        $getUserById->first_name = $first_name;
        $getUserById->last_name = $last_name;
        $getUserById->save();
    }
    public function del($id){
        User::find($id)->delete();
        return redirect()->action('userController@index');
    }
}
