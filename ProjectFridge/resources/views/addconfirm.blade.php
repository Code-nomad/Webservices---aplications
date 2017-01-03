@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Confirmed</div>

                <div class="panel-body">
                    {{$drinks->name}} is successfully added to the system!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection