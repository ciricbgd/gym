<div class="container cards_home">
    @foreach($cards as $card)
        <div class="card">
            <div class="card_header {{$card->color}}-gradient-color">
                <h3>{{$card->name}}</h3>
            </div>
            <div class="card_name">${{$card->price}}</div>
            <div class="card-body">
                <table class="table table-hover table-sm">
                    {!! $card->perks !!}
                </table>
                @if(session()->has('user'))
                    <form action="{{route('purchaseMembership')}}" method="POST">
                        {{csrf_field()}}
                        @if(session()->has('user'))
                        @endif
                        <input type="hidden" name="user_id" value="{{session()->get('user')[0]->id}}">
                        <input type="hidden" name="membership_id" value="{{$card->id}}">
                        <input type="submit" class="form-control btn btn-primary" value="Purchase">
                    </form>
                @else
                    <p class="text-info text-justify">Please log in to purchase.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>