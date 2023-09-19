@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{ route('add.loan') }}">+Create Loan</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Loan List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
                <th>SL</th>
                <th>Authorities Name</th>
                <th>Account Name</th>
                <th>Loan Reason</th>
                <th>Reference</th>
                <th>Interest</th>
                <th>Payment Type</th>
                <th>Note</th>
                <th>Payable Amount</th>
                <th>Action</th>
            </tr>

            @foreach ($loans as $loan)


            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->authority->name }}</td>
                <td>{{ $loan->AccountName->account_name}}</td>
                <td>{{ $loan->loan_reasion }}</td>
                <td>{{ $loan->reference }}</td>
                <td>{{ $loan->interest }}Tk</td>
                <td>Cash Credit(CC) Loan</td>
                <td>{{ $loan->note }}</td>
                <td>{{ $loan->loan_amount }} Tk</td>
              <td>
                <a href="#" class="btn btn-secondary"> <i class="fas fa-details"></i></a>
                <a href="{{ route('loan.edit',$loan->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
            </td>
            </tr>


            @endforeach

          </table>



          {{-- {{$authors->links()}} --}}



        </div>
      </div>
    </div>
  </div>


  @endsection
