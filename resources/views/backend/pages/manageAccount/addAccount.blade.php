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
                    <h4 class="text-center">Add Account Form</h4>
                  </div>

                  <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputName1">Bank Holder Name</label>
                            <input type="text" class="form-control" id="inputName1" placeholder="Bank Holder Name">
                          </div>

                      <div class="form-group col-md-6">
                        <label for="inputName2">Bank Name</label>
                        <input type="text" class="form-control" id="inputName2" placeholder="Bank Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputBalance1">Account Number</label>
                        <input type="number" class="form-control" id="inputBalance1" placeholder="Password">
                      </div>


                      <div class="form-group col-md-6">
                        <label for="inputBalance">Opening Balance</label>
                        <input type="number" class="form-control" id="inputBalance" placeholder="Bank Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact Number </label>
                        <input type="tel" class="form-control" id="inputPassword4" placeholder="Contact Number">
                      </div>

                      <div class="form-group col-md-12">
                        <label for="inputPassword4">Bank Address </label>
                        <input type="text" class="form-control text-area" id="inputPassword4" placeholder="Bank Address">
                      </div>

                    </div>

                    <div class="center">
                        <button type="submit" class="btn btn-success ">Submit</button>
                    </div>
                  </div>
                  </div>
                </div>
              </div>

@endsection
