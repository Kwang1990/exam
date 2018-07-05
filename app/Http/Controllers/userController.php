<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUser;

class userController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user=$user;
    }
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
    public function store(CreateUser $request){
        // $file = Input::file('avatar');
        // $file_path='user/'.time().$file->getClientOriginalName();
        // Storage::disk('local')->put($file_path, $file_path);
        $path = $request->file('avatar')->store('public/avatars');
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = $allRequest['password'];
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];
        $date_of_birth = $allRequest['date_of_birth'];
        $dataInsertToDatabase = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'date_of_birth'=>$date_of_birth,
            'avatar'=>$path
        );
        $this->user->create($dataInsertToDatabase);
        return redirect()->action('userController@index');
    }
    public function edit($id){
        $objUser = new User();
        $getUserById = $objUser->find($id)->toArray();
        return view('admin.user.edit')->with('getUserById',$getUserById);
    }
    public function update(Request $request){
        $path = $request->file('avatar')->store('public/avatars');
        $allRequest = $request->all();
        $id = $allRequest['id'];
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = $allRequest['password'];
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];
        $date_of_birth = $allRequest['date_of_birth'];

        $objUser = new User();
        $getUserById  = $objUser->find($id);
        $getUserById->name = $name;
        $getUserById->email = $email;
        $getUserById->password = $password;
        $getUserById->first_name = $first_name;
        $getUserById->last_name = $last_name;
        $getUserById->date_of_birth = $date_of_birth;
        $getUserById->avatar = $path;
        $getUserById->save();
        return redirect()->action('userController@index');

    }
    public function del($id){
        $user = $this->user->find($id);
        $avatar= $user->avatar;
        if($user->delete()){
                    Storage::delete($avatar);
    }
        return redirect()->action('userController@index');
    }
}
