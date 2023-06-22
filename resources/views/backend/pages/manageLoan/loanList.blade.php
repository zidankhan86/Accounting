@extends('backend.master')
@section('content')

<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="text-success">Loan List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>ID</th>
              <th>Reference No</th>
              <th>Authority</th>
              <th>Account</th>
              <th>Amount</th>
              <th>Interest</th>
              <th>Payable</th>
              <th>Due</th>
              <th>Installment</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            {{-- @foreach ($authors as $account) --}}


            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="#" class="btn btn-secondary">Detail</a>
                <a href="" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
            </tr>


            {{-- @endforeach --}}

          </table>



          {{-- {{$authors->links()}} --}}



        </div>
      </div>
    </div>
  </div>


  @endsection
