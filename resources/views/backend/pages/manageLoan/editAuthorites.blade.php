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
            <h4 class="text-center">+Edit Authorities</h4>
        </div>
        <form  method="POST" enctype="multipart/form-data" id="authoritiesForm">


            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Authorities Name</label>
                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="name" placeholder="Authorities Name">

                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $edit->email }}" id="email" placeholder="Email">

                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="number">Contact Number</label>
                        <input type="tel" name="number" value="{{ $edit->number }}" class="form-control" id="number" placeholder="Contact Number">

                        @error('number')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cash_limit">Cash Credit (CC) Loan Limit</label>
                        <input class="form-control" type="number" value="{{ $edit->cash_limit }}" name="cash_limit" id="cash_limit" value="100000"
                            placeholder="100000">

                        @error('cash_limit')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $edit->address }}" class="form-control" id="address"
                            placeholder="Enter an address">

                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="status">Account Status</label>
                        <input type="hidden" name="status" value="{{ $edit->status }}" class="form-control" id="status"
                            placeholder="Account Status">
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>

                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12" style="width: 80%;">
                        <label for="note" style="font-size: 18px;">Note</label>
                        <textarea name="note" value="{{ $edit->note }}" class="form-control" id="note"
                            placeholder="Write your note here....."
                            style="font-size: 16px; height: 150px; padding: 10px; resize: vertical;">{{ $edit->note }}</textarea>

                        @error('note')
                        <small class="text-danger" style="font-size: 14px;">{{ $message }}</small>
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
        const authoritiesForm = document.getElementById('authoritiesForm');
        const submitButton = document.getElementById('submit');

        submitButton.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the form from submitting directly

            // Perform client-side validation
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const number = document.getElementById('number').value;
            const cashLimit = document.getElementById('cash_limit').value;
            const address = document.getElementById('address').value;

            if (!name || !email || !number || !cashLimit || !address) {
                toastr.error('All fields are required.');
                return;
            }

            // Additional client-side validation logic can be added here

            // If all validation passes, proceed with sending the AJAX request
            const formData = new FormData(authoritiesForm);

            axios.post("{{ route('update.authorities.create', $edit->id) }}", formData)
                .then(function (response) {
                    // Handle success, you can show a success message or redirect here if needed
                    console.log(response.data);
                    // Reset the form if the submission was successful
                    authoritiesForm.reset();
                    // You can add a success message or toast here
                    toastr.success('Authorities updated successfully.');
                })
                .catch(function (error) {
                    // Handle errors, you can display an error message here if needed
                    console.error(error);
                    // You can add an error message or toast here
                    toastr.error('An error occurred while updating the authorities');
                });
        });
    });
</script>

@endsection
