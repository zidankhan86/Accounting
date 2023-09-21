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
            <h4 class="text-center">+Add Loan Type</h4>
        </div>
        <form id="loanTypeForm" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="loan_type">Loan Type</label>
                        <input type="text" name="loan_type" class="form-control" id="loan_type" placeholder="Loan Type">
                        <small class="text-danger" id="loan_typeError"></small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="Inactive">Inactive</option>
                            <option value="Active">Active</option>
                        </select>
                        <small class="text-danger" id="statusError"></small>
                    </div>
                </div>

                <div class="center">
                    <button type="button" id="submitForm" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let loanTypeForm = document.getElementById('loanTypeForm');
        let submitButton = document.getElementById('submitForm');

        submitButton.addEventListener('click', async () => {
            // Clear previous error messages


            // Get form input values
            let loanType = document.getElementById('loan_type').value;
            let status = document.getElementById('status').value;

            if (loanType.length === 0) {
                alert('Loan Type field is required');
            }

            if (status.length === 0) {
                alert('Status field is required');
            }

            if (loanType.length > 0 && status.length > 0) {
                let formData = {
                    loan_type: loanType,
                    status: status,
                };

                let URL = "{{ route('loan.type.create') }}";
                try {
                    let response = await axios.post(URL, formData);
                    loanTypeForm.reset();
                    successToast('Loan Type Added successfully');
                    // You can redirect or perform other actions here
                } catch (error) {
                    if (error.response.status === 422) {
                        let errors = error.response.data.errors;
                        for (let key in errors) {
                            let errorMessage = errors[key][0];
                            $(`#${key}Error`).text(errorMessage);
                        }
                    } else {
                        errorToast('An error occurred while processing your request.');
                    }
                }
            }
        });
    });
</script>


@endsection
