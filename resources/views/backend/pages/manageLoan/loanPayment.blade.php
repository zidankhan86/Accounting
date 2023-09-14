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
        <h4 class="text-center">+Create Loan Payment</h4>
      </div>
    <form action="{{ route('loan.payment.create') }}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
               <div class="form-group col-md-12">
                <label for="inputName1">Loan* (Select a loan account)</label>
                <select class="form-control" name="Account_name_id" id="" >
                @foreach ($accounts as $item)
                <option value="{{$item->id  }}" >Account:{{$item->account_name  }},Number:{{$item->account_number  }}</option>
                @endforeach
                </select>
                @error('Account_name_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>

           <div class="form-group col-md-3">
            <label for="inputName2">Account*</label>
           <select class="form-control" name="Authorities_name_id" id="">

            @foreach ($authorities as $item)

            <option value="{{ $item->id }}"> {{ $item->name }}</option>

            @endforeach
           </select>
            @error('bank_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>


            <div class="form-group col-md-3">
            <label for="inputBalance1">Available Balance</label>
            <select name="expense_id" id="" class="form-control">
            @foreach ($accountName as $expense)
            <option value="{{ $expense->id }}">{{ $expense->income - $expense->expense }} Tk</option>
            @endforeach
            </select>
            @error('account_number')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>

           <div class="form-group col-md-3">
            <label for="inputName2">Payable Amount</label>

           <select name="loan_id" id="" class="form-control">
            @foreach ($loan as $item)
            <option value="{{ $item->id }}">{{ $item->loan_amount  }}</option>
            @endforeach

           </select>
            @error('expense_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

           <div class="form-group col-md-3">
            <label for="inputName2">Due</label>
           <input class="form-control" type="text" value="{{ $item->loan_amount }}" name="loan_amount" placeholder="Due....">
            @error('loan_amount')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>




           <div class="form-group col-md-6">
            <label for="inputName2">Loan Amount*</label>
           <input class="form-control" type="number" name="loan_payment" placeholder="Enter amount">
            @error('loan_payment')
            <p class="text-danger">{{$message}}</p>
            @enderror
           </div>

          <div class="form-group col-md-6">
            <label for="inputBalance1">Date </label>
            <input type="date" name="date" class="form-control" id="inputBalance1" placeholder="Enter an address ">
            @error('date')
            <small class="text-danger">{{$message}}</small>
            @enderror
           </div>

           <div class="form-group col-md-12">
            <label for="inputAddress">Status</label>
              <select class="form-control" name="status" id="">
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
