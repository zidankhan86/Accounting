@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="text-success">Loan List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
                <th>Loan Type</th>
                <th>Authorities Name</th>
                <th>Account Name</th>
                <th>Loan Reason</th>
                <th>Reference</th>
                <th>Interest</th>
                <th>Payment Type</th>
                <th>Duration</th>
                <th>Per Month</th>
                <th>Note</th>
                <th>Loan Amount</th>
            </tr>

            @foreach ($loans as $loan)


            <tr>
                <td>{{ $loan->loan_type_id }}</td>
                <td>{{ $loan->authority->name }}</td>
                <td>{{ $loan->AccountName->account_name}}</td>
                <td>{{ $loan->loan_reasion }}</td>
                <td>{{ $loan->reference }}</td>
                <td>{{ $loan->interest }}</td>
                <td>{{ $loan->payment_type }}</td>
                <td>{{ $loan->duration }}</td>
                <td>{{ $loan->per_month }}</td>
                <td>{{ $loan->note }}</td>
                <td>{{ $loan->loan_amount }}</td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
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
