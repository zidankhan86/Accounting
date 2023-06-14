@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Simple Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Account Holder Name</th>
              <th>Bank Name</th>
              <th>Account Number</th>
              <th>Opening Balance</th>
              <th>Contact Number</th>
              <th>Bank Address</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            @foreach ($accounts as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->account_holder_name}}</td>
              <td>{{$account->bank_name}}</td>
              <td>{{$account->account_number}}</td>
              <td>{{$account->opening_balance}} BDT</td>
              <td>{{$account->contact_number}}</td>
              <td>{{$account->bank_address}}</td>
              <td><div class="badge badge-success">Active</div></td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="#" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
            </tr>

            @endforeach

          </table>
        </div>
      </div>
      <div class="card-footer text-right">
        <nav class="d-inline-block">
          <ul class="pagination mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>


  @endsection
