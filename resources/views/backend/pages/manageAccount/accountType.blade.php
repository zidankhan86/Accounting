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
        <h4 class="text-center">+Add Account Type</h4>
      </div>
    <form action="{{route('account.type.create')}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Account Type Name</label>
                <input type="text" name="account_name" class="form-control" id="inputName1" placeholder="Account Type Name">

                @error('expense_name')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-12">
            <label for="inputName2">Account Status</label>
            <input type="hidden" name="account_status" class="form-control" id="inputName2" placeholder="Account Status">
            <select name="account_status" class="form-control" name="" id="">
                <option  value="Inactive">Inactive</option>
                <option value="Active">Active</option>
            </select>
            @error('expense_type')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

        </div>

        <div class="center">
            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
      </div>

        </form>

      </div>
    </div>
  </div>

@endsection
