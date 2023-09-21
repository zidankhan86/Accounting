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
        <h4 class="text-center">+Add Expense Type</h4>
      </div>

      <div>
        <h6 style="text-align: right;"><i class="fas fa-chevron-right">Manage Accounts </i>
            <i class="fas fa-chevron-right">Expense Type </i> </h6>
      </div>

    <form  method="POST" enctype="multipart/form-data" id="expenseCat">


      <div class="card-body">
        <div class="form-row">


          <div class="form-group col-md-6">
            <label for="inputName2">Expense Type</label>
            <input type="text" name="expense_type" class="form-control" id="expense_type" placeholder="Expense Type">
            @error('expense_type')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>



          <div class="form-group col-md-6">
            <label for="inputDetails">Expense Details</label>
            <input type="text" name="expense_details" class="form-control" id="expense_details" placeholder="Expense Details">

            @error('expense_details')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>


          <div class="form-group col-md-12">
                <label for="inputName1">Type Status</label>
            <select name="status" class="form-control" id="status">
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
              </div>

        </div>

        <div class="center">
            <button type="submit" id="submit" class="btn btn-success ">Submit</button>
        </div>
      </div>

        </form>

      </div>
    </div>
  </div>

  <script>
    let contactForm = document.getElementById('expenseCat');
contactForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    let expense_type = document.getElementById('expense_type').value;
    let expense_details = document.getElementById('expense_details').value;
    let status = document.getElementById('status').value;

    if (expense_type.length === 0) {
        alert('Expense type field is required');
    } else if (expense_details.length === 0) {
        alert('Expense details field is required');
    } else if (status.length === 0) {
        alert('Status field is required');
    } else {
        let formData = {
            expense_type: expense_type,
            expense_details: expense_details,
            status: status,
        };
        let URL = "{{ route('expense.type.create') }}"; 
        let result = await axios.post(URL, formData);
        contactForm.reset();
        successToast('Expense type added, Success');
    }
});

      </script>


@endsection
