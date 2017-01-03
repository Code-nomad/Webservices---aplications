@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Log of the last orders</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Drink</th>
                          <th>For</th>
                          <th>FullFilled By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order as $ordr)
                            <tr>
                              <td>{{$ordr->created_at}}</td>
                              <td>{{$ordr->drinkname}}</td>
                              <td>{{$ordr->username}}</td>
                              <td>{{$ordr->fbname}}</td>
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
