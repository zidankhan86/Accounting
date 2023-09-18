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
                        <select class="form-control" name="account_number" id="account_number">
                            @foreach ($accounts as $item)
                            <option value="{{$item->account_number}}" >Account:{{$item->account_name}},
                                Number:{{$item->account_number}}</option>
                            @endforeach
                        </select>
                        @error('account_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <!-- Hidden input for Account_name_id -->
                    <input type="hidden" name="Account_name_id" id="Account_name_id" value=" {{ $item->id }}">

                    <div class="form-group col-md-3">
                        <label for="inputName2">Account*</label>
                        <input class="form-control" type="text" name="name" id="name" readonly>
                    </div>

                    <!-- Hidden input for expense_id -->
                    <input type="hidden" name="Authorities_name_id" id="expense_id" value="{{ $item->id }}">

                    <div class="form-group col-md-3">
                        <label for="inputBalance1">Available Balance</label>
                        <input class="form-control" type="text" name="balance" id="balance" readonly>
                    </div>

                    <!-- Hidden input for loan_id -->


                    <div class="form-group col-md-3">
                        <label for="inputName2">Payable Amount</label>
                        <input class="form-control" type="text" name="loan_amount" id="loan_amount" readonly>
                    </div>

                    <input type="hidden" name="loan_id" id="loan_id" value="{{ $item->id }}">

                    <div class="form-group col-md-3">
                        <label for="inputName2">Due</label>
                        <input class="form-control" type="text" name="due" id="due" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputName2">Loan Payment Amount*</label>
                        <input class="form-control" type="number" name="loan_payment" placeholder="Enter amount">
                        @error('loan_payment')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputBalance1">Date </label>
                        <input type="date" name="date" class="form-control" id="inputBalance1" placeholder="Enter a date">
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
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add change event listener to the account_number select field
        $('#account_number').on('change', function() {
            // Get the selected account_number value
            var selectedAccountNumber = $(this).val();

            // Loop through the loan data using JavaScript to find the corresponding loan_amount and name
            @foreach ($loan as $item)
                if ("{{ $item->account_number }}" === selectedAccountNumber) {
                    // Set the selected loan_amount in the loan_amount input field
                    $('#loan_amount').val("{{ $item->loan_amount }}");

                    // Set the selected due in the due input field
                    $('#due').val("{{ $item->loan_amount }}");

                    // Set the selected name in the name input field
                    $('#name').val("{{ $item->name }}");

                    // Set the selected balance in the balance input field
                    $('#balance').val("{{ $item->income - $item->expense }}");
                    return; // Exit the loop once a match is found
                }
            @endforeach

            // If no match is found, clear the fields
            $('#loan_amount, #due, #name, #balance').val("");
        });
    });
</script>

@endsection
