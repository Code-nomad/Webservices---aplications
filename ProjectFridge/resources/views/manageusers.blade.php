@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Users</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Person</th>
                          <th>User State</th>
                          <th>Update State</th>
                          <th>Disable</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($people as $pers)
                        <tr>
                          <td>{{$pers->name}}</td>
                          <td>
                            @if ($pers->admin_user === '0')
                              New User
                            @elseif($pers->admin_user === '1')
                              Normal User
                            @else
                              Admin User
                            @endif
                          </td>
                          <td>
                              @if ($pers->admin_user === '0')
                                <a href="{{ url('/dashboard/manageusers/upgrade/'.$pers->id) }}" class="btn btn-primary btn-sm btn-block" role="button">Confirm User</a>
                              @elseif($pers->admin_user === '1')
                                <a href="{{ url('/dashboard/manageusers/upgrade/'.$pers->id) }}" class="btn btn-danger btn-sm btn-block" role="button">Make Admin</a>
                              @else
                                <a href="{{ url('/dashboard/manageusers/downgrade/'.$pers->id) }}" class="btn btn-warning btn-sm btn-block" role="buton">Make Normal User</a>
                              @endif                  
                          </td>
                          <td><a href="{{ url('/dashboard/manageusers/disable/'.$pers->id) }}" class="btn btn-danger btn-sm" role="button">DEL</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
