@extends('admin_panel')
@section('admin_page')
    <table class="table table-hover">
        @foreach($memberships as $membership)
            <tr>
                <td><input type="text" name="tbName" class="form-control membershipName" value="{{$membership->name}}" size="1" data-mid="{{$membership->id}}"></td>
                <input type="hidden" name="_token" value="{{csrf_token()}}" class="token" data-mid="{{$membership->id}}">
                <td>
                    <select name="selectColor" class="form-control membershipColor" data-mid="{{$membership->id}}">
                        <option value="blue" @if($membership->color=='blue'){{'selected'}}@endif>blue</option>
                        <option value="green" @if($membership->color=='green'){{'selected'}}@endif>green</option>
                        <option value="red" @if($membership->color=='red'){{'selected'}} @endif>red</option>
                    </select>
                </td>
                <td>
                        <input type="text" class="form-control membershipPrice" name="tbPrice" value="{{$membership->price}}" size="1" maxlength="6" data-mid="{{$membership->id}}">
                    </div>
                </td>
                <td><button class="btn btn-secondary btnEditMembership" data-mid="{{$membership->id}}">Edit membership</button></td>
                <td><button class="btn btn-danger btnDeleteMembership" data-mid="{{$membership->id}}">Delete membership</button></td>
            </tr>
        @endforeach
    </table>

    <form action="{{route('insertMembership')}}" method="POST" style="max-width:320px;">
        {{csrf_field()}}
        <input type="text" name="name" class="form-control" placeholder="New membership name">
        <br>
        <input type="text" name="color" class="form-control" placeholder="Color">
        <br>
        <input type="text" name="price" class="form-control" placeholder="Price in $">
        <br>
        <textarea name="perks" class="form-control" placeholder="Preks&#10Seperate them with \ slash sign"></textarea>
        <br>
        <input type="submit" class="btn btn-primary mb-2">
    </form>
@endsection