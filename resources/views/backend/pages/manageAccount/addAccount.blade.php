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
            <h4 class="text-center">+Add Account Form</h4>
        </div>
        <div>
            <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Accounts</i> <i
                    class="fas fa-chevron-right"> Accounts Setup</i></h6>
        </div>

        <form action="{{ route('add.account.create') }}" method="POST" enctype="multipart/form-data" id="accountForm">


            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="account_name">Account Name</label>
                        <input type="text" name="account_name" class="form-control" id="account_name"
                            placeholder="Account Name">

                        @error('account_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="account_type_id">Account Type</label>
                        <select name="account_type_id" class="form-control" id="account_type_id">
                            @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_type }}</option>
                            @endforeach
                        </select>

                        @error('account_type_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="account_number">Account Number</label>
                        <input type="text" name="account_number" class="form-control" id="account_number"
                            placeholder="Account Number">
                        @error('account_number')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="status">Account Status</label>
                        <input type="hidden" name="status" class="form-control" id="status"
                            placeholder="Account Status">
                        <select class="form-control" name="status" id="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>

                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="center">
                    <button type="button" class="btn btn-success" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountForm = document.getElementById('accountForm');

        document.getElementById('submit').addEventListener('click', function () {
            const formData = new FormData(accountForm);

            axios.post("{{ route('add.account.create') }}", formData)
                .then(function (response) {
                    // Handle success, you can show a success message or redirect here if needed
                    console.log(response.data);
                    // Reset the form if the submission was successful
                    accountForm.reset();
                    // You can add a success message or toast here
                     successToast('Account added, Success');
                })
                .catch(function (error) {
                    // Handle errors, you can display an error message here if needed
                    console.error(error);
                    // You can add an error message or toast here
                    // Example: errorToast('An error occurred while adding the account');
                });
        });
    });
</script>

@endsection
