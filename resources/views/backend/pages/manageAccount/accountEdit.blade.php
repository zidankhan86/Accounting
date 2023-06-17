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
        <h4 class="text-success">Edit Account</h4>
      </div>
    <form action="{{route('add.account.create')}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Account Name</label>
                <input type="text" name="account_name" value="{{$edit->account_name}}" class="form-control" id="inputName1" placeholder="Account Name">

                @error('account_holder_name')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-6">
            <label for="inputName2">Account Type</label>




                <select name="account_id" id="" class="form-control">

                    @foreach ($accounts as $accounts)

                    <option value="{{$accounts->id}}">{{$accounts->account_name}}</option>

                    @endforeach

                </select>


            @error('bank_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-6">
            <label for="inputBalance1">Account Number</label>
            <input type="number" name="account_number" value="{{$edit->account_number}}" class="form-control" id="inputBalance1" placeholder="Account Number">
            @error('account_number')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>

           <div class="form-group col-md-12">
            <label for="inputAddress">Account Status</label>
            <input type="hidden" name="account_status" class="form-control " id="inputAddress" placeholder="Account Status">
              <select class="form-control" name="account_status" id="">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>

            @error('bank_address')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>

        </div>

        <div class="center">
            <button type="submit" class="btn btn-success ">Update Changes</button>
        </div>
      </div>

        </form>

      </div>
    </div>
  </div>

@endsection
