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
        <h4 class="text-center">+Add Authorities Form</h4>
      </div>
    <form action="{{route('add.account.create')}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Authorities Name</label>
                <input type="text" name="account_name" class="form-control" id="inputName1" placeholder="Authorities Name">

                @error('account_holder_name')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-6">
            <label for="inputName2">Email</label>
           <input class="form-control" type="email" name="email" placeholder="Email">

            @error('bank_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-6">
            <label for="inputBalance1">Contact Number</label>
            <input type="number" name="number" class="form-control" id="inputBalance1" placeholder="Contact Number">
            @error('account_number')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>


           <div class="form-group col-md-6">
            <label for="inputName2">Cash Credit (CC) Loan Limit</label>
           <input class="form-control" type="email" name="cash_credit" placeholder="Cash Credit (CC) Loan Limit">

            @error('bank_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-6">
            <label for="inputBalance1">Address </label>
            <input type="text" name="address" class="form-control" id="inputBalance1" placeholder="Enter an address ">
            @error('address')
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

          <div class="form-group col-md-12" style="width: 80%;">
            <label for="inputAddress" style="font-size: 18px;">Note</label>
            <textarea name="note" class="form-control" id="inputAddress" placeholder="Write your note here....." style="font-size: 16px; height: 150px; padding: 10px; resize: vertical;"></textarea>

            @error('note')
            <small class="text-danger" style="font-size: 14px;">{{$message}}</small>
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
