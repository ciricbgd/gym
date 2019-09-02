@extends('admin_panel')
@section('admin_page')
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <table class="table table-hover">
        <thead>
            <th>Title</th>
            <th>Image</th>
            <th>alt</th>
            <th>text</th>
            <th>edit</th>
            <th>delete</th>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td><input type="text" class="articleHeader form-control" value="{{$article->header}}" data-id="{{$article->id}}"></td>
                    <td><img src="{{url('/')}}/img/articles/{{$article->img}}" alt="{{$article->alt}}" style="width:100px;height:50px;object-fit:cover;"></td>
                    <td><input type="text" class="articleAlt form-control" value="{{$article->alt}}" data-id="{{$article->id}}"></td>
                    <td><textarea cols="50" rows="3" class="articleText form-control" data-id="{{$article->id}}">{{$article->text}}</textarea></td>
                    <td><button class="btn btn-secondary btnEditArticle" data-id="{{$article->id}}">Edit showcase</button></td>
                    <td><button class="btn btn-danger deleteArticle" data-id="{{$article->id}}">Delete article</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <form action="{{route('submitArticle')}}" method="POST" id="articleForm" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="header" class="form-control" placeholder="New article title">
            <br>
            <input type="file" name="image" class="form-control">
            <br>
            <input type="text" name="alt" class="form-control" placeholder="Alt for image">
            <br>
            <textarea name="text" class="form-control" placeholder="Text"></textarea>
            <br>
            <input type="submit" class="btn btn-primary mb-2">
        </form>
@endsection