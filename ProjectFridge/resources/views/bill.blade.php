@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Debts list</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Person</th>
                          <th>Amount</th>
                          <th>Last Payed</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($people as $pers)
                        <tr>
                          <td>{{$pers->name}}</td>
                          <td>€ {{number_format($pers->bill,2)}}</td>
                          <td>{{$pers->lastpayed}}</td>
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