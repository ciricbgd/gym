@extends('layouts.shell')
@section('content')
    <div id="signle_article" class="page">
        <article>
            <h3>{{$article[0]->header}}</h3>
            <img src="{{url('/img/articles')}}/{{$article[0]->img}}" alt="{{$article[0]->alt}}">
            <p>{{$article[0]->text}}</p>
        </article>
    </div>
@endsection