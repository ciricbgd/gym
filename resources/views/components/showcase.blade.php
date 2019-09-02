<h1>The gym showcase</h1>
<h2>Our best moments</h2>
@foreach($showcase as $img)
    <a href="{{url('/')}}/img/showcase/{{$img->img}}" data-lightbox="gym" data-title="{{$img->title}}"><img src="{{url('/')}}/img/showcase/{{$img->img}}" alt="{{$img->alt}}"></a>
@endforeach