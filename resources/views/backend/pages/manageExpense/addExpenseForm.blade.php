@extends('backend.master')
@section('content')


<style>
    .center {
    text-align: center;
    }
</style>



<div class="col-12 col-md-12 col-lg-12">


    <div class="card">
      <div class="card-header">
        <h4 class="text-center">+Add Expense </h4>
      </div>
    <form action="{{route('expense.create')}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Payable</label>
                <input type="number" name="payable" class="form-control" id="inputName1" placeholder="Payable">

                @error('payable')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-6">
            <label for="inputName2">Expense Account</label>
            <input type="text" name="expense_account" class="form-control" id="inputName2" placeholder="Expense Account">
            @error('expense_account')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>



          <div class="form-group col-md-6">
            <label for="inputDetails">Expense Type</label>
            <input type="text" name="expense_type" class="form-control" id="inputDetails" placeholder="Expense Type">

            @error('expense_details')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>




          <div class="form-group col-md-4">
            <label for="inputName2">Item Name</label>
            <input type="text" name="item_name" class="form-control" id="inputName2" placeholder="Item Name">
            @error('item_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>



          <div class="form-group col-md-4">
            <label for="inputAmount">Item Price</label>
            <input type="number" name="item_price" class="form-control" id="inputAmount" placeholder="Item Price">

            @error('item_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>


                <div class="form-group col-md-4">
        <label for="inputAmount">Item Quantity</label>
        <div class="input-group">
            <input type="number" name="item_quantity" class="form-control" id="inputAmount" placeholder="Item Quantity">
            <div class="input-group-append">
            <button class="btn btn-outline-danger quantity-decrease" type="button"><i class="fas fa-minus"></i></button>
            <button class="btn btn-outline-success quantity-increase" type="button"><i class="fas fa-plus"></i></button>
            </div>
        </div>

        @error('item_quantity')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>


        <div class="form-group col-md-12">
            <label for="inputName1">Status</label>
            <input type="hidden" name="status" class="form-control" id="inputName1" placeholder="Status">

            <select  class="form-control" name="status" id="">
                <option value="Cash_In" style="color: green">Cash In</option>
                <option value="Cash_Out" style="color: red">Cash Out</option>
            </select>

            @error('status')

            <small class="text-danger">{{$message}}</small>

            @enderror
          </div>




        </div>


        <div class="center">
            <button type="submit" class="btn btn-success " style="color: rgb(8, 8, 8);">Submit</button>
        </div>




      </div>

        </form>

      </div>
    </div>
  </div>

@endsection
