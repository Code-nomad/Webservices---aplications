@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}, are you sure you want to order a {{$drinks->name}}
                @if (Auth::user()->id  == $user->id)
                    for Yourself?
                @else
                   for {{$user->name}}?
                @endif
                </div>
                <div class="panel-body">
                	<div class="btn-group-vertical btn-block" role="group" aria-label="yes-no">
                	<a href="{{ url('/update/'.$user->id.'/'.$drinks->id) }}" class="btn btn-success btn-lg" role="button"><h5>Yes, and order another drink</h5></a>
                	<a href="{{ url('/people/') }}" class="btn btn-danger btn-lg" role="button"><h5>Cancel My Order</h5></a>
                	<a href="{{ url('/lastupdate/'.$user->id.'/'.$drinks->id) }}" class="btn btn-warning btn-lg" role="button"><h5>That's It!</h5></a>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection