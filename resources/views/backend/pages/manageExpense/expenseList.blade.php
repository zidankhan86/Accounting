@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="text-success">Expense List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Date & Time</th>
              <th>Payable</th>
              {{-- <th>Expense Account</th> --}}
              <th>Total Amount</th>
              <th>Total Quantity</th>
              <th>Account Type</th>
              <th>Item Name</th>
              <th>Item Price</th>
              <th>Item Quantity</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            @foreach ($expenses as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->created_at}}</td>
              <td>{{$account->payable}}</td>
              {{-- <td>{{$account->transactionAccount->account_name}}</td> --}}

              <td>{{$totalExpenseAmount}} BDT</td>
              <td>{{$totalItemQuantity}}</td>

              <td>{{$account->ExpenseType->expense_type}}</td>
              <td>{{$account->item_name}}</td>
              <td>{{$account->item_price}}</td>
              <td>{{$account->item_quantity}}</td>
              <td>{{$account->status}}</td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="#" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
            </tr>

            @endforeach

          </table>
          {{$expenses->links()}}
        </div>
      </div>
    </div>
  </div>


  @endsection
