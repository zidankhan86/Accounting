@extends('backend.master')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="pricing text-center" id="printableContent">
            <div class="pricing-title">
                Spectaror: {{ auth()->user()->name }}
            </div>
            <div class="pricing-padding">
                <div class="pricing-price">
                    <div><small class="pricing-title">Account Name:</small> {{ $view->account_name }}</div>
                </div>
                <div class="pricing-details">
                    <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Account No: {{ $view->account_number }}</div>
                    </div>
                    <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Resion: {{ $view->payable }}</div>
                    </div>
                    <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Item Price: {{ $view->item_price }} Tk</div>
                    </div>
                    <div class="pricing-item">
                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                        <div class="pricing-item-label">Status: {{$view->status == 1 ? 'Active':'Inactive'}}</div>
                    </div>
                    <div class="pricing-item">
                        <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                        <div class="pricing-item-label">Date: {{ $view->date }}</div>
                    </div>
                </div>
            </div>
            <div class="pricing-cta">
                <a href="javascript:void(0);" onclick="printDiv('printableContent');">Print <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
</div>

<script>
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>

<style>
  @media print {
      body * {
          visibility: hidden;
      }
      #printableContent, #printableContent * {
          visibility: visible;
      }
      #printableContent {
          position: absolute;
          left: 0;
          top: 0;
      }
  }
</style>

@endsection
