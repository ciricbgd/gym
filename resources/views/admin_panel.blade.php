@extends('layouts.shell')
@section('css')
    <link rel="stylesheet" href="{{url('/')}}/css/admin_panel.css">
@show
@section('content')
        @include('components.admin_menu')
        <div id="admin_right">
            @yield('admin_page')
        </div>
@endsection
@section('js')
    <script src="{{url('/')}}/js/admin_panel.js"></script>
@show
