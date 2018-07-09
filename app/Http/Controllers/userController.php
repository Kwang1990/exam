<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUser;
use DB;

class userController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user=$user;
    }
    //
    public function index(Request $request){
    	// dd(route('user.index'));
        // dd($request->ajax());
    	$users = DB::table('users');
        if($request->ajax()){
            $output=" <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DayOfBirth</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>";
            if(!empty($request->email)){
            $users = $users->where('email','like',"%".$request->email."%");

            // ->orwhere('first_name','like',"%".$request->search."%")->orwhere('last_name','like',"%".$request->search."%");
            }
            if(!empty($request->fname)){
            $users = $users->where('first_name','like',"%".$request->fname."%");
            
            // ->orwhere('first_name','like',"%".$request->search."%")->orwhere('last_name','like',"%".$request->search."%");
            }
            if(!empty($request->lname)){
            $users = $users->where('last_name','like',"%".$request->lname."%");
            
            // ->orwhere('first_name','like',"%".$request->search."%")->orwhere('last_name','like',"%".$request->search."%");
            }
            // else if(!empty($request->search1)){
            //     $users = $users->where('first_name','like',"%".$request->search1."%");
            // }
            // else if(!empty($request->search2)){
            //     $users = $users->where('last_name','like',"%".$request->search2."%");
            // }
             
            foreach ($users->get() as $user) {

               $output.= "<tr>".
                        "<td>".$user->id."</td>".
                        "<td>".$user->email."</td>".
                        "<td>".$user->name."</td>".
                        "<td>".$user->first_name."</td>".
                        "<td>".$user->last_name."</td>".
                        "<td>".$user->date_of_birth."</td>".
                        "<td>".$user->avatar."</td>".
                        "<td>".
                            "<a href=\"".url('/admin/user/'.$user->id.'/edit')."\" class=\"btn btn-info\" role=\"button\">Edit</a>".
                            "<a href=\"".url('/admin/user/'.$user->id.'/delete')."\" class=\"btn btn-danger\" role=\"button\" onclick=\"return confirm('Are you sure?')\">Del</a>".
                        "</td>".
                    "</tr>" ;
                   // dd($output);
            }
           
            //dd($users->get());
            return Response($output);

           

        }
    	return view('admin.user.index',[
    		'users'=>$users->get()
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
            'password' => Hash::make($password),
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
        $password = Hash::make($allRequest['password']);
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
