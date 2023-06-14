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
                <form action="{{route('add.account.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                  <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputName1">Bank Holder Name</label>
                            <input type="text" name="account_holder_name" class="form-control" id="inputName1" placeholder="Bank Holder Name">

                            @error('account_holder_name')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                          </div>

                      <div class="form-group col-md-6">
                        <label for="inputName2">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="inputName2" placeholder="Bank Name">
                        @error('bank_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputBalance1">Account Number</label>
                        <input type="number" name="account_number" class="form-control" id="inputBalance1" placeholder="Password">
                        @error('account_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>


                      <div class="form-group col-md-6">
                        <label for="inputBalance">Opening Balance</label>
                        <input type="number" name="opening_balance" class="form-control" id="inputBalance" placeholder="Bank Name">

                        @error('opening_balance')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact Number </label>
                        <input type="tel" name="contact_number" class="form-control" id="inputPassword4" placeholder="Contact Number">

                        @error('contact_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <div class="form-group col-md-12">
                        <label for="inputAddress">Bank Address </label>
                        <input type="text" name="bank_address" class="form-control text-area" id="inputAddress" placeholder="Bank Address">

                        @error('bank_address')
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
