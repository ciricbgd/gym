@extends('layouts.shell')
@section('css')
    <link rel="stylesheet" href="{{url('/')}}/css/lightslider.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/lightbox.min.css">
@endsection
@section('content')
    <div id="page_home" class="page">
        @include('components.cards')
    </div>
    @if($workoutcheck==1)
        <div id="page_workouts" class="page">
            @include('components.workouts')
        </div>
    @endif
    @if(session()->has('user'))
        @if(!$surveys->isEmpty())
            <div id="page_survey" class="page">
                @include('components.survey')
            </div>
        @endif
    @endif
    <div id="page_articles" class="page">
        @include('components.articles')
    </div>
    <div id="page_showcase" class="page">
        @include('components.showcase')
    </div>
@endsection
@section('js')
    <script src="{{url('/')}}/js/lightslider.min.js"></script>
    <script src="{{url('/')}}/js/lightbox.min.js"></script>
@endsection