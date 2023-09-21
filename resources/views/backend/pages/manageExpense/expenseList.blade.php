@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{ route('add.expense') }}">+Create Expense</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Expense List</h4>
      </div>
      <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Expenses </i>
            <i class="fas fa-chevron-right">Expense List </i> </h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Payment Reason</th>
              <th> Account</th>
              <th>Total Amount</th>
              <th>Item Name</th>
              <th>Item Price</th>
              <th>Item Quantity</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            @foreach ($expenses as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->date}}</td>
              <td>{{$account->payable}}</td>
              <td>{{$account->account_name}}</td>
              <td>{{$totalExpenseAmount}} BDT</td>
              <td>{{$account->item_name}}</td>
              <td>{{$account->item_price}} Tk</td>
              <td>{{$account->quanity}}</td>
              <td>{{$account->status == 1 ? 'Active':'Inactive'}}</td>
              <td>


                <a href="{{ route('expense.edit',$account->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger" onclick="return confirm('Do you wants to Delete ?')"><i class="fas fa-trash"></i></a>
                <a href="#" class="btn btn-info" ><i class="fas fa-tags"></i> </a>


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
