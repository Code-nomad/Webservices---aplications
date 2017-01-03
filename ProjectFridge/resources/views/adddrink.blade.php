@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Product</div>
                <div class="panel-body"> 
                  <form method="POST" action="{{ url('/dashboard/adddrinks/update') }}"> 
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table">
                      <tbody>
                      <tr>
                        <td>Name: </td>
                        <td><input type="text" class="form-control" name="name" aria-label="name" value="Enter Product Name Here"></td>
                      </tr>
                      <tr>
                        <td>Store Price: </td>
                        <td>
                        <div class="input-group">
                          <span class="input-group-addon">€</span>
                          <input type="text" class="form-control" name="store_price" aria-label="s_price" value="0.00">
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Sell Price: </td>
                        <td>
                        <div class="input-group">
                          <span class="input-group-addon">€</span>
                          <input type="text" class="form-control" name="our_price" aria-label="o_price" value="0.00">
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><button class="btn btn-success" type="submit">Add</button></td>
                      </tr>
                      </tbody>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection