<html>
    <div>
        <h3>list Users</h3>

        <div>
            <table>

                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of birth</th>
                    <th>Action</th>
                    <th><a href="{{ route('user.create')}}">Add user</a></th>
                   
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->date_of_birth}}</td>
                        <td>
                            <a href='user/<?php echo $user['id'];?>/edit'>Edit</a>
                            <a href='user/<?php echo $user['id'];?>/delete'>Del</a>
                        </td>
                    </tr>
                @endforeach
            </table>
           
        </div>
        <div></div>
        <!-- @includeIf('admin.shared.activity_logs._detail_modal',[]) -->
    </div>
</html>
