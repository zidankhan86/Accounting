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

      <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Expenses </i>
            <i class="fas fa-chevron-right"> Add Expenses </i> </h6>
      </div>

    <form action="{{route('expense.create')}}" method="POST" enctype="multipart/form-data">
        @csrf

                <div class="card-body">
                <div class="form-row">
                
                <div class="form-group col-md-6">
                <label for="inputName2">Expense Account Name</label>

                <select name="transaction_type_id" id="" class="form-control">

                @foreach ($accountName as $expense)

                <option value="{{$expense->id}}">Account: {{$expense->account_name}} Balance: {{ $expense->income -$expense->expense }} TK. </option>

                @endforeach

                </select>
                @error('expense_details')
                <small class="text-danger">{{$message}}</small>
                @enderror
                </div>





                <div class="form-group col-md-6">
                <label for="inputName2">Account Type</label>

                <select name="expense_type" id="" class="form-control">

                @foreach ($expenses as $expense)

                <option value="{{$expense->id}}">{{$expense->expense_type}}</option>

                @endforeach

                </select>
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
                <input type="number" name="quanity" class="form-control" id="inputAmount" placeholder="Item Quantity">
                <div class="input-group-append">
                <button class="btn btn-outline-danger quantity-decrease" type="button"><i class="fas fa-minus"></i></button>
                <button class="btn btn-outline-success quantity-increase" type="button"><i class="fas fa-plus"></i></button>
                </div>
                </div>

                @error('quanity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                <div>
                <input type="hidden" name="expense_id" value="{{$expense->id}}">
                </div>

                <div class="form-group col-md-12">
                <label for="inputName1">Status</label>
                <select  class="form-control" name="status" id="">
                <option value="0" style="color: green">Cash Out</option>
                <option value="1" style="color: red">Cash In</option>
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
