@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <div style="text-align: right;">
            <a class="btn btn-success text-center" style="display: inline-block;" href="{{ route('account.type') }}">+Create Account Type</a>
        </div>
      <div class="card-header">
        <h4 class="text-success">Account Type List</h4>
      </div>
      <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Accounts </i>
             <i class="fas fa-chevron-right">List Accounts Type</i> </h6>
    </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>

              <th>Account Type Name</th>
              <th>Account Status</th>
              <th>Action</th>
            </tr>

            @foreach ($accountType as $account)


            <tr>
              <td>{{$account->id}}</td>
              <td>{{$account->account_type}}</td>
              <td>{{$account->status == 1 ? 'Active' : 'Inactive'}}</td>
              <td>
                <a href="{{ route('account.type.edit',$account->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="{{ route('account.type.delete',$account->id) }}" class="btn btn-danger" onclick="return confirm('Warninf! Do you want to delete?')"><i class="fas fa-trash"></i></a>
            </td>
            </tr>

            @endforeach

          </table>
          {{$accountType->links()}}
        </div>
      </div>
    </div>
  </div>


  @endsection
