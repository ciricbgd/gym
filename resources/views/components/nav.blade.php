<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route($home[0]->route)}}">{{$home[0]->name}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(Request::route()->getName()=='home')
                @foreach($nav as $n)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{$n->route}}">{{$n->name}}<span class="sr-only"></span></a>
                    </li>
                @endforeach
            @endif
                @if($errors->any())
                    <li class="text-danger">{{$errors->first()}}</li>
                @endif
        </ul>
        @if(session()->has('user'))
            @if(session()->get('user')[0]->role_id > 0)
                <a href="{{route($home[1]->route)}}" class="nav_btn"><button class="btn btn-outline-warning my-2 my-sm-0">{{$home[1]->name}}</button></a>
            @endif
        @endif
        @if(session()->has('user'))
            <a href="{{route($home[2]->route)}}" class="nav_btn"><button class="btn btn-outline-warning my-2 my-sm-0">{{session()->get('user')[0]->username}} | {{$home[2]->name}}</button></a>
        @endif
        @if(!session()->has('user'))
            <a href="{{route('register')}}" class="nav_btn"><button class="btn btn-outline-warning my-2 my-sm-0">Register</button></a>
            <div class="nav_btn login_toggle">
                <button class="btn btn-outline-warning my-2 my-sm-0">Login</button>
            </div>
            <form action="{{route('login')}}" method="POST" id="login_form" style="display:none">
                {{csrf_field()}}
                <input type="text" class="form-control" name="tbUsername" placeholder="username">
                <input type="password" class="form-control" name="tbPassword" placeholder="password">
                <input type="submit" class="form-control clickable" value="Login">
            </form>
    </div>
        @endif
</nav>
