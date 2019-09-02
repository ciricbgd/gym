<div class="workouts">
    <p>Workouts left: {{$workouts[0]->workouts}}</p>
    @if(session()->has('user'))
        <form action="{{route('workout')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="user_id" value="{{session()->get('user')[0]->id}}">
            <input type="submit" class="form-control btn btn-primary" value="Check-in (workout)">
        </form>
    @endif
</div>