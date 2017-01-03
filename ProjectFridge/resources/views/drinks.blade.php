@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choose a drink for {{$user->name}}</div>
                <div class="panel-body">
                    <div class="btn-group-vertical btn-block" role="group" aria-label="people">
                    @if(empty($drinks))
                        Geen personen gevonden
                    @endif
                    @foreach ($drinks as $drinks)
                        <a href="{{ url('/people/'.$user->id.'/'.$drinks->id) }}" class="btn btn-primary btn-lg" role="button"><h5>{{$drinks->name}} &rarr; € {{number_format($drinks->verkoop_prijs,2)}}</h5></a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
