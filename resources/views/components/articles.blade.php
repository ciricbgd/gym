<section id="articles">
    @foreach($articles as $article)
    <article>
        <h3>{{$article->header}}</h3>
        <img src="{{url('/img/articles')}}/{{$article->img}}" alt="{{$article->alt}}">
        <p>{{$article->text}}</p>
        <a class="btn btn-primary" href="{{url('/article')}}/{{$article->id}}">Read more</a>
    </article>
    @endforeach
</section>
<div id="articlePager">
    <button class="btn btn-primary float-left articleBtn articleBtnLeft"><</button>
    <p class="text-white" id="articlePageNumber">page:1</p>
    <button class="btn btn-primary float-right articleBtn articleBtnRight">></button>
</div>
<input type="hidden" name="_token" value="{{csrf_token()}}" id="pagerToken">
