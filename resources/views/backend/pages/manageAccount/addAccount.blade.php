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
                            <label for="inputName1">Account Name</label>
                            <input type="text" name="account_name" class="form-control" id="inputName1" placeholder="Account Name">

                            @error('account_name')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                          </div>

                      <div class="form-group col-md-6">
                        <label for="inputName2">Account Type</label>




                            <select name="account_type_id" id="" class="form-control">

                                @foreach ($accounts as $accounts)

                                <option value="{{$accounts->id}}">{{$accounts->account_type}}</option>

                                @endforeach

                            </select>


                        @error('account_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                       </div>

                      <div class="form-group col-md-6">
                        <label for="inputBalance1">Account Number</label>
                        <input type="text" name="account_number" class="form-control" id="inputBalance1" placeholder="Account Number">
                        @error('account_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                       </div>

                       <div class="form-group col-md-12">
                        <label for="inputAddress">Account Status</label>
                        <input type="hidden" name="status" class="form-control " id="inputAddress" placeholder="Account Status">
                          <select class="form-control" name="status" id="">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                          </select>

                        @error('status')
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
