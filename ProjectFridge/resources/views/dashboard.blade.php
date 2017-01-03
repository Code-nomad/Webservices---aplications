@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashbord</div>
                <div class="panel-body">  
                  <div class="btn-group-vertical btn-block" role="group" aria-label="people">
                    <a href="{{ url('/dashboard/balance') }}" class="btn btn-primary btn-lg" role="button"><h5>Financial Balance</h5></a>
                    @if($auth_user->admin_user == 2)
                    <a href="{{ url('/dashboard/adddrinks') }}" class="btn btn-warning btn-lg" role="button"><h5>Add Drink</h5></a>
                    <a href="{{ url('/dashboard/updatedrinks') }}" class="btn btn-warning btn-lg" role="button"><h5>Update Drink Prices</h5></a>
                    <a href="{{ url('/dashboard/paybill') }}" class="btn btn-warning btn-lg" role="button"><h5>Pay Bill</h5></a>
                    <a href="{{ url('/dashboard/manageusers') }}" class="btn btn-danger btn-lg" role="button"><h5>Manage Users</h5></a>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
