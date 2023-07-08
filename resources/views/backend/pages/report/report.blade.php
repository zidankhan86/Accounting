@extends('backend.master')
@section('content')
<h4 class="text-center text-light">Balance</h4><br><br>


<div>

<div class="row">
    @foreach ($accounts as $item)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Account: <span class="text-danger">{{ $item->account_name }}</span></h4>
                <p class="card-text">Balance: {{ ($item->id) }}</p>
            </div>

        </div>

    </div>

    @endforeach
</div>
{{$accounts->links()}}
</div>
<h4 class="text-center text-primary">Report</h4>
<form action="" method="get" class="form-group">
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
            <button class="mt-4 btn btn-primary">SEARCH</button>
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
                <th scope="col">Paid</th>
                <th scope="col">Due</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $item)
            <tr class="">
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->account_name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->due>0 ? $item->due : 'No Due' }}</td>
                <td>{{ $item->status == true?'Cash In':'Cash Out' }}</td>
                <td>
                    <a href="#" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center;">
        <button onclick="printDiv('orderReport')" class="btn btn-success">Print</button>
      </div>



<script>
    function printDiv(divId){
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</div>

@endsection
