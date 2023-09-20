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
        <h4 class="text-center">+Edit Loan</h4>
      </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Authorities Name</label>



                <select class="form-control" name="name" id="">
                    @foreach ($authorities as $authoritie)

                    <option value="{{$authoritie->name}}">{{$authoritie->name}}</option>
                    @endforeach
                </select>



                @error('account_holder_name')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

        <div>
            <input type="hidden" value="{{ $authoritie->id }}" name="Authorities_name_id">
        </div>

          <div class="form-group col-md-3">
            <label for="inputName2">Account</label>

           <select class="form-control" name="account_number" id="">
            @foreach ($accounts as $account)

            <option value="{{$account->account_number}}">Account:{{$account->account_name}},Number:{{$account->account_number}}</option>

            @endforeach
           </select>

            @error('account_number')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>
                <div>
                    <input type="hidden" name="Account_name_id" value="{{ $account->id }}">
                </div>
          <div class="form-group col-md-3">
            <label for="inputBalance1">Loan Reason</label>
            <input type="text" name="loan_reasion" class="form-control" id="inputBalance1" placeholder="Write Loan Reason here....">
            @error('loan_reasion')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>

           <div class="form-group col-md-3">
            <label for="inputName2">Reference</label>
           <input class="form-control" type="text" name="reference" value="{{ $edit->reference }}" placeholder="Reference....">

            @error('bank_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-3">
            <label for="inputBalance1">Loan Type</label>

            <select class="form-control" name="loan_type_id" id="">
                @foreach ($loanTypes as $loanType)
                <option value="{{$loanType->id}}">{{$loanType->loan_type}}</option>
                @endforeach

            </select>
            @error('account_number')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>


           <div class="form-group col-md-6">
            <label for="inputName2">Payable Amount</label>
           <input class="form-control" type="number" name="loan_amount" placeholder="100000">

            @error('cash_credit')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-6">
            <label for="inputBalance1">Interest (%) </label>
            <input type="number" name="interest" class="form-control" id="inputBalance1" placeholder="Enter an address ">
            @error('address')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>

           <div class="form-group col-md-12">
            <label for="inputAddress">Status</label>
              <select class="form-control" name="payment_type" id="">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>

            @error('status')
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
