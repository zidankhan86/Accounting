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
            <h4 class="text-center">+Edit Account Type</h4>
          </div>
    <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right"> <a href="">Manage Accounts</a> </i> <i class="fas fa-chevron-right"> <a href="">Accounts Type Edit </a> </i> </h6>
    </div>


    <form action="{{route('account.type.update',$accountType->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Account Type Name</label>
                <input type="text" name="account_type" value="{{ $accountType->account_type }}" class="form-control" id="inputName1" placeholder="Account Type Name">

                @error('account_type')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-12">
            <label for="inputName2">Account Status</label>
            <input type="hidden" name="status" class="form-control" id="inputName2" placeholder="Account Status">
            <select name="status" class="form-control" name="status"  id="">
                <option  value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
            @error('status')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

        </div>

        <div class="center">
            <button type="submit" class="btn btn-info ">Update Changes</button>
        </div>
      </div>

        </form>

      </div>
    </div>
  </div>

@endsection
