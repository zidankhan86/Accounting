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
    <h4 class="text-center">+Edit Expense </h4>
     </div>
       <div>
         <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Expenses </i>
          <i class="fas fa-chevron-right"> Edit Expenses </i> </h6>
            </div>

                <form action="{{route('expense.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label for="inputName1">Payment Reasion</label>
                    <input type="text" name="payable" value="{{$edit->payable}}" class="form-control" id="inputName1" placeholder="i.e: Eid bonus...">

                    @error('payable')

                    <small class="text-danger">{{$message}}</small>

                     @enderror
                     </div>

                     <div class="form-group col-md-6">
                        <label for="inputName2">Select Expense Account Name</label>
                        <select name="expense_type_id" id="" class="form-control">
                            @foreach ($accountName as $expense)
                                <option value="{{$expense->id}}">
                                    Account: {{$expense->account_name}}
                                   , Balance Availeable: {{ $expense->income - $expense->expense }} TK.
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="amount" value="{{ $expense->income - $expense->expense }}">
                        @error('expense_type_id')
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
                @error('expense_type')
                <small class="text-danger">{{$message}}</small>
                @enderror
                </div>




                <div class="form-group col-md-4">
                <label for="inputName2">Item Name</label>
                <input type="text" name="item_name" value="{{ $edit->item_name }}" class="form-control" id="inputName2" placeholder="Item Name">
                @error('item_name')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>



                <div class="form-group col-md-4">
                <label for="inputAmount">Amount*</label>
                <input type="number" name="item_price" value="{{ $edit->item_price }}" class="form-control" id="inputAmount" placeholder="Enter an amount">
                @error('item_price')
                <small class="text-danger">{{$message}}</small>
                @enderror
                </div>


                <div class="form-group col-md-4">
                <label for="inputAmount">Item Quantity</label>
                <div class="input-group">
                <input type="number" name="quanity" value="{{ $edit->quanity }}" class="form-control" id="inputAmount" placeholder="Item Quantity">
                <div class="input-group-append">
                <button class="btn btn-outline-danger quantity-decrease" type="button"><i class="fas fa-minus"></i></button>
                <button class="btn btn-outline-success quantity-increase" type="button"><i class="fas fa-plus"></i></button>
                </div>
                </div>

                @error('quanity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                   <div class="form-group col-md-12">
                    <label for="inputName1">Payment Date</label>
                    <input type="date" name="date" value="{{ $edit->date }}" class="form-control" id="inputName1">

                    @error('date')
                    <small class="text-danger">{{$message}}</small>
                     @enderror
                    </div>

                <div>
                <input type="hidden" name="expense_id" value="{{$expense->id}}">
                </div>

                <div class="form-group col-md-12">
                <label for="inputName1">Status</label>
                <select  class="form-control" name="status" id="">
                <option value="0" style="color: green">Remove Balance</option>
                <option value="1" style="color: red">Add Balance</option>
                </select>

                @error('status')

                <small class="text-danger">{{$message}}</small>

                @enderror
                </div>

                <div class="form-group col-md-12" style="margin-bottom: 20px;">
                    <label for="inputName1" style="font-size: 18px; font-weight: bold;">Note</label>
                    <input type="text" name="note" value="{{ $edit->note }}" class="form-control" id="inputName1" style="height: 60px; font-size: 16px;" placeholder="Write Your Note Here.." /> <!-- Increase height and font size -->

                    @error('note')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


               </div>
               <div class="center">
               <button type="submit" class="btn btn-info " style="color: rgb(8, 8, 8);">Update Changes</button>
             </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
