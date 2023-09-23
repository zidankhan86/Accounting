@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{ route('loan.payment') }}">+Create Loan Payment</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Loan Payment List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
                <th>SL</th>
                <th>Authorities Name</th>
                <th>Account Name</th>
                <th>Loan Amount</th>
                <th>Loan Payment</th>
                <th>Balance</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($loanPayment as $item)

           <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->account_number }}</td>
            <td>{{ $item->loan_amount }}Tk</td>
            <td>{{ $item->loan_payment }}Tk</td>
            <td>{{ $item->balance }}Tk</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->status == 1? 'Active':'Inactive' }}</td>
            <td>
                <a href="" class="btn btn-info"><i class="fas fa-edit"></i></a>
            </td>

            </tr>
            @endforeach


          </table>



          {{$loanPayment->links()}}



        </div>
      </div>
    </div>
  </div>


  @endsection
