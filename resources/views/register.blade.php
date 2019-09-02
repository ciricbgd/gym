@extends('layouts.shell') @section('content')
<div id="register_page">
</div>
<form action="{{route('register_send')}}" method="POST" enctype="multipart/form-data" class="container rounded" id="register_form">
    {{ csrf_field() }}
    <table>
        <tr>
            <td><input type="text" class="form-control" name="tbFirstName" id="tbFirstName" placeholder="Firstname"></td>
            <td><input type="text" class="form-control" name="tbLastName" id="tbLastName" placeholder="Lastname"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" name="tbUsername" id="tbUsername" placeholder="Username"></td>
            <td><input type="password" class="form-control" name="tbPassword" id="tbPassword" placeholder="Password"></td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="text-muted">Birth date (optional):</p>
                <div class="dateholder">
                    <select class="form-control dateselector" id="dateDay" name="dateDay">
                        <option value="">Day</option>
                        @for($i=1; $i<=31; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <select class="form-control dateselector" id="dateMonth" name="dateMonth">
                        <option value="">Month</option>
                        @for($i=1; $i<=12; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <select class="form-control dateselector" id="dateYear" name="dateYear">
                        <option value="">Year</option>
                        @for($i=date('Y'); $i>=date('Y')-100; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="email" class="form-control" name="tbEmail" id="tbEmail" placeholder="Email"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="tel" class="form-control" name="tbPhone" id="tbPhone" placeholder="Phone number (optional)"></td>
        </tr>
        <tr class="registration_row">
            <td colspan="2" class="registerholder"><button type="submit" class="btn btn-primary">Register</button></td>
        </tr>
    </table>
</form>
@if ($errors->any() OR !empty($alerts))
<div class="container form_alerts">
    <div class="alert alert-danger">
        <ul>
            @if(!empty($alerts)) @foreach ($alerts as $alert)
            <li>{{ $alert }}</li>
            @endforeach @endif() @if($errors->any()) @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach @endif()
        </ul>
    </div>
</div>
@endif @endsection
