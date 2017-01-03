@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Prices</div>
                <div class="panel-body">  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Store Price</th>
                          <th>Selling Price</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($drinks as $drink)
                        <tr>
                          <td>{{$drink->name}}</td>
                          <form method="POST" action="{{ url('/dashboard/updatedrinks/update') }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="d_id" value="{{ $drink->id }}">
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control" name="new_store_price" aria-label="balance" value="{{number_format($drink->inkoop_prijs,2)}}">
                                <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit">Edit</button>
                                </span>
                              </div>
                            </td>
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control" name="new_sell_price" aria-label="balance" value="{{number_format($drink->verkoop_prijs,2)}}">
                                <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit">Edit</button>
                                </span>
                              </div>
                            </td>
                          </form>
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