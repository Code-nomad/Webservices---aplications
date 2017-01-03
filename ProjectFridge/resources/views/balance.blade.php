@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Financial Balance</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Person</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($people as $pers)
                        <tr>
                          <td>{{$pers->name}}</td>
                          <td>€ {{number_format($pers->bill,2)}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <thead>
                        <tr>
                          <th>{{$company->name}}</th>
                          <th>
                            <form method="POST" action="{{ url('/dashboard/balance/update') }}">
                              <div class="input-group">
                                <span class="input-group-addon">€</span>
                                <input type="text" class="form-control" name="newvalue" aria-label="balance" value="{{number_format($company->balance,2)}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit">Edit</button>
                                </span>
                              </div>
                            </form>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td>€ {{number_format($bill,2)}}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection