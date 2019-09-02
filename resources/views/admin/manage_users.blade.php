@extends('admin_panel')
@section('admin_page')
    <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Birth date</th>
                    <th>Phone number</th>
                    <th>Role</th>
                    @if(session()->get('user')[0]->role_id>=3)<th>Change Role</th>@endif
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr data-uid="{{$user->id}}">
                    <input type="hidden" name="_token" class="token" value="{{csrf_token()}}" data-uid="{{$user->id}}">
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->date}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    @if(session()->get('user')[0]->role_id>=3)
                        <td>
                            <select class="form-control selectRole" data-uid="{{$user->id}}">
                                @foreach($roles as $role)
                                    @if($user->role!=$role->role AND $role->role!='owner')
                                        <option class="form-control" value="{{$role->id}}">{{$role->role}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    @endif
                    <td><button class="btn btn-secondary btnEditUser" data-uid="{{$user->id}}">Edit user</button></td>
                    <td><button class="btn btn-danger btnDeleteUser" data-uid="{{$user->id}}">Delete user</button></td>
                </tr>
            @endforeach
            </tbody>
    </table>
@endsection