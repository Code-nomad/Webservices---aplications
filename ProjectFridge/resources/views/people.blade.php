@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Who's thirsty</div>
                <div class="panel-body">
                    <div class="btn-group-vertical btn-block" role="group" aria-label="people">
                    @if(empty($people))
                        Geen personen gevonden
                    @endif
                    @foreach ($people as $pers)
                        <a href="{{ url('/people/'.$pers->id) }}" class="btn btn-primary btn-lg" role="button"><h5>{{$pers->name}}</h5></a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

