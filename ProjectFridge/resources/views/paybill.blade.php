@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pay Your Bill</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Person</th>
                          <th>Current Bill</th>
                          <th>Wants to Pay</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($people as $pers)
                        <tr>
                          <td>{{$pers->name}}</td>
                          <td>€ {{number_format($pers->bill,2)}}</td>
                          <td>
                            <form method="POST" action="{{ url('/dashboard/paybill/update') }}">
                              <div class="input-group">
                                <span class="input-group-addon">€</span>
                                <input type="text" class="form-control" name="newvalue" aria-label="balance" value="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="u_id" value="{{ $pers->id }}">
                                <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit">Edit</button>
                                </span>
                              </div>
                            </form>   
                          </td>
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