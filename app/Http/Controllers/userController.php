<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUser;
use DB;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user=$user;

    }

    //
    public function index(Request $request)
    {
        if (auth()->user()->level == 0) {
            abort(403);
        }
        $itemPerPage = 2;
        $users = DB::table('users')->paginate($itemPerPage);
        if ($request->ajax()) {
            $output = " <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DayOfBirth</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>";
            $users = DB::table('users')->orWhere(function ($query) use ($request) {
                if (!empty($request->email)) {
                    $query->where('email', 'like', "%" . $request->email . "%");
                }
                if (!empty($request->fname)) {
                    $query->where('first_name', 'like', "%" . $request->fname . "%");
                }
                if (!empty($request->lname)) {
                    $query->where('last_name', 'like', "%" . $request->lname . "%");
                }
            })
                ->paginate($itemPerPage);
            $p = (string)$users->links();
            if (!empty($request->page)) {
                $users = DB::table('users')->orWhere(function ($query) use ($request) {
                    if (!empty($request->email)) {
                        $query->where('email', 'like', "%" . $request->email . "%");
                    }
                    if (!empty($request->fname)) {
                        $query->where('first_name', 'like', "%" . $request->fname . "%");
                    }
                    if (!empty($request->lname)) {
                        $query->where('last_name', 'like', "%" . $request->lname . "%");
                    }
                })
                    ->offset($itemPerPage * ($request->page - 1))
                    ->limit($itemPerPage)
                    ->get();
            }
            foreach ($users as $user) {

                $output .= "<tr>" .
                    "<td>" . $user->id . "</td>" .
                    "<td>" . $user->email . "</td>" .
                    "<td>" . $user->name . "</td>" .
                    "<td>" . $user->first_name . "</td>" .
                    "<td>" . $user->last_name . "</td>" .
                    "<td>" . $user->date_of_birth . "</td>" .
                    '<td><img class="mx-auto d-block img-thumbnail" width="200px" height="200px" src="'.Storage::url($user->avatar).'"></td>'.
                    "<td>" .
                    "<a href=\"" . url('/admin/user/' . $user->id . '/edit') . "\" class=\"btn btn-info\" role=\"button\">Edit</a>" .
                    "<a href=\"" . url('/admin/user/' . $user->id . '/delete') . "\" class=\"btn btn-danger\" role=\"button\" onclick=\"return confirm('Are you sure?')\">Del</a>" .
                    "</td>" .
                    "</tr>";

            }

            return Response()->json([
                'output' => $output,
                'users' => $users,
                'pagination' => $p,
            ]);
        }
        return view('admin.user.index', compact('users'));

    }

    public function detail($id)
    {
        return view('admin.user.detail');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateUser $request)
    {
        $path = $request->file('avatar')->store('public/avatars');
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = $allRequest['password'];
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];
        $date_of_birth = $allRequest['date_of_birth'];
        $dataInsertToDatabase = array(
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'date_of_birth' => $date_of_birth,
            'avatar' => $path
        );
        $this->user->create($dataInsertToDatabase);
        return redirect()->action('UserController@index');
    }

    public function edit($id)
    {
        $objUser = new User();
        $getUserById = $objUser->find($id)->toArray();
        return view('admin.user.edit')->with('getUserById', $getUserById);
    }

    public function update(CreateUser $request)
    {
        $allRequest = $request->all();
        $id = $allRequest['id'];
        $objUser = new User();
        $getUserById = $objUser->find($id);
        $path = $getUserById->avatar;
        if(!empty($request->file('avatar'))) {
            $path = $request->file('avatar')->store('public/avatars');
        }
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $password = Hash::make($allRequest['password']);
        $first_name = $allRequest['first_name'];
        $last_name = $allRequest['last_name'];
        $date_of_birth = $allRequest['date_of_birth'];

        $getUserById->name = $name;
        $getUserById->email = $email;
        $getUserById->password = $password;
        $getUserById->first_name = $first_name;
        $getUserById->last_name = $last_name;
        $getUserById->date_of_birth = $date_of_birth;
        $getUserById->avatar = $path;
        $getUserById->save();
        return redirect()->action('UserController@index');

    }

    public function del($id)
    {
        $user = $this->user->find($id);
        $avatar = $user->avatar;
        if ($user->delete()) {
            Storage::delete($avatar);
        }
        return redirect()->action('UserController@index');
    }
}
