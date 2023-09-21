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
        <div>
            <h6 style="text-align: right;">
                <i class="fas fa-chevron-right">Manage Accounts</i>
                <i class="fas fa-chevron-right">Accounts Type</i>
            </h6>
        </div>

        <form method="POST" enctype="multipart/form-data" id="accountTypeForm">

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="account_type">Account Type Name</label>
                        <input type="text" name="account_type" class="form-control" id="account_type"
                            placeholder="Account Type Name">

                        <small class="text-danger" id="accountTypeValidationError"></small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="status">Account Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>

                        <small class="text-danger" id="statusValidationError"></small>
                    </div>
                </div>

                <div class="center">
                    <button type="button" class="btn btn-success" id="submitForm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountTypeForm = document.getElementById('accountTypeForm');
        const submitButton = document.getElementById('submitForm');

        submitButton.addEventListener('click', function () {
            // Clear previous error messages

            const statusValidationError = document.getElementById('statusValidationError');


            statusValidationError.innerText = '';

            const account_type = document.getElementById('account_type').value;
            const status = document.getElementById('status').value;

            if (account_type.length === 0) {
                alert('Account Type field is required');
            }
            if (status.length === 0) {
               
                alert('Account Status field is required');
            }

            if (account_type.length > 0 && status.length > 0) {
                const formData = new FormData(accountTypeForm);

                axios.post("{{ route('account.type.create') }}", formData)
                    .then(function (response) {
                        // Handle success, you can show a success message or redirect here if needed
                        console.log(response.data);
                        // Reset the form if the submission was successful
                        accountTypeForm.reset();
                        // Show the success toast
                        successToast('Account type added, Success');
                    })
                    .catch(function (error) {
                        // Handle errors, you can display an error message here if needed
                        console.error(error);
                        // Show an error toast
                        errorToast('An error occurred while adding the account type');
                    });
            }
        });
    });
</script>

@endsection
