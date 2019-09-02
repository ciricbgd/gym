@extends('admin_panel')
@section('admin_page')
    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
    <table class="table table-hover">
        <thead>
            <th>Title</th>
            <th>img</th>
            <th>alt</th>
            <th>edit</th>
            <th>delete</th>
        </thead>
        <tbody>
            @foreach($showcase as $img)
                <tr>
                    <td><input type="text" class="showcaseTitle form-control" value="{{$img->title}}" data-id="{{$img->id}}"></td>
                    <td>
                        <img src="{{url('/')}}/img/showcase/{{$img->img}}" alt="{{$img->alt}}" style="width:100px;height:50px;object-fit:cover;">
                        <!--<input type="file" class="showcaseImg" data-id="{{$img->id}}" style="width:100px;">-->
                    </td>
                    <td><input type="text" value="{{$img->alt}}" class="showcaseAlt form-control" data-id="{{$img->id}}"></td>
                    <td><button class="btn btn-secondary btnEditShowcase" data-id="{{$img->id}}">Edit showcase</button></td>
                    <td><button class="btn btn-danger deleteShowcase" data-id="{{$img->id}}">Delete showcase</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{url('/')}}/admin/insertShowcase" enctype="multipart/form-data" method="POST" style="max-width:320px;">
        {{csrf_field()}}
        <input type="text" class="form-control" name="title" placeholder="New showcase title">
        <br>
        <input type="file" name="image" class="form-control">
        <br>
        <input type="text" class="form-control" name="alt" placeholder="image alt">
        <br>
        <input type="submit" class="btn btn-primary mb-2">
    </form>
@endsection