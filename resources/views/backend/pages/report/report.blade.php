@extends('backend.master')
@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total User</h4>
          </div>
          <div class="card-body">
            10
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Account</h4>
          </div>
          <div class="card-body">
            {{ $totalAcc }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Loan Amount</h4>
          </div>
          <div class="card-body">
             <small> {{ $lonTotal }} Tk</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Online Users</h4>
          </div>
          <div class="card-body">
            47
          </div>
        </div>
      </div>
    </div>
  </div>



<br><br><br>
    <h4 class="text-center text-primary">REPORT</h4><br>
    <form action="#"  class="form-group">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label class="control-label" for="y"> Select Year</label>
                <select name="y" id="y" class="form-control">
                    @foreach(array_combine(range(date("Y"), 1900), range(date("Y"), 1900)) as $year)
                    <option value="{{ $year }}" @if($year===old('y', Request::get('y', date('Y')))) selected @endif>
                        {{ $year }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label class="control-label" for="m">Select Month</label>
                <select name="m" for="m" class="form-control">
                    @foreach(cal_info(0)['months'] as $month)
                    <option value="{{ $month }}" @if($month===old('m', Request::get('m', date('m')))) selected @endif>
                        {{ $month }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <label for="Entity" class="form-label">Select Type</label>
                <select name="entity" id="" class="form-control">
                    <option value="0">Cash Out</option>
                    <option value="1">Cash In</option>
                </select>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <button class="mt-4 btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table" id="orderReport">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Account</th>
                    <th scope="col">Expense Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Pay Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $item)
                    <tr class="">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->account_name }}</td>
                        <td>{{ $item->expenseType->expense_type }}</td>
                        <td>{{ $item->amount }} Tk</td>
                        <td>{{ $item->payable }}</td>
                        <td>{{ $item->status == true ? 'Cash In' : 'Cash Out' }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
