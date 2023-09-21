@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{ route('add.authorities') }}">+Create Authorities</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Loan Authorities List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Authorities Name</th>
              <th>Email</th>
              <th>Contact Number</th>
              <th>Loan Limit</th>
              <th>Address</th>
              <th>Account Status</th>
              <th>Action</th>
            </tr>

            @foreach ($authors as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->name}}</td>
              <td>{{$account->email}}</td>
              <td>{{$account->number}}</td>
              <td>{{$account->cash_limit}} BDT</td>
              <td>{{$account->address}}</td>
              <td>{{$account->status}}</td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="{{route('edit.authorities.create',$account->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
            </tr>

            @endforeach

          </table>
          {{$authors->links()}}
        </div>
      </div>
    </div>
  </div>


  @endsection
