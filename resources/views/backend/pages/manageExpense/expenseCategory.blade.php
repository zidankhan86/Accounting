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
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName1">Expense Name</label>
                <input type="text" name="expense_name" class="form-control" id="inputName1" placeholder="Expense Name">

                @error('expense_name')

                <small class="text-danger">{{$message}}</small>

                @enderror
              </div>

          <div class="form-group col-md-6">
            <label for="inputName2">Expense Type</label>
            <input type="text" name="expense_type" class="form-control" id="inputName2" placeholder="Expense Type">
            @error('expense_type')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>



          <div class="form-group col-md-6">
            <label for="inputBalance">Expense Details</label>
            <input type="number" name="expense_details" class="form-control" id="inputBalance" placeholder="Expense Details">

            @error('expense_details')
            <small class="text-danger">{{$message}}</small>
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
