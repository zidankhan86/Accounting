@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{route('add.account')}}">+Create Account</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Account List</h4>
      </div>
      <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Accounts </i>
             <i class="fas fa-chevron-right">List Accounts</i> </h6>
    </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Account Name</th>
              <th>Account Type</th>
              <th>Account Number</th>

              <th>Account Status</th>

              <th>Action</th>
            </tr>

            @foreach ($accounts as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->account_name}}</td>
              <td>{{$account->AccountSetup->account_type}}</td>
              <td>{{$account->account_number}}</td>

              <td>{{$account->status == 1 ? 'Active' : 'Inactive'}}</td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="{{route('account.manage.edit',$account->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger" onclick="return confirm('Sorry! It can not be delete')"><i class="fas fa-trash"></i></a>
            </td>
            </tr>

            @endforeach

          </table>
          {{$accounts->links()}}
        </div>
      </div>
    </div>
  </div>


  @endsection
