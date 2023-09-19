<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('report')}}">Accounting</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{route('report')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Accounts </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Manage Accounts</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('account.type.list')}}"><i class="fas fa-tags"></i>Accounts Type</a></li>



            <li><a class="nav-link" href="{{route('account.list')}}"><i class="fas fa-user"></i> Accounts</a></li>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-alt"></i> <span>Manage Expenses</span></a>
          <ul class="dropdown-menu">

            <li><a class="nav-link" href="{{route('manage.expense')}}"><i class="fas fa-tags"></i>Expenses type</a></li>


            <li><a class="nav-link" href="{{route('expense.list')}}"><i class="fas fa-exchange-alt"></i>Expenses</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-holding-usd"></i> <span>Manage Loan
        </span></a>
          <ul class="dropdown-menu">

            <li><a class="nav-link" href="{{route('authorities.list')}}"><i class="fas fa-university"></i>Authorities</a></li>


            <li><a class="nav-link" href="{{route('add.loan.type')}}"><i class="fas fa-tags"></i>Loan Types</a></li>


             <li><a class="nav-link" href="{{route('loan.list')}}"><i class="fas fa-hand-holding-usd"></i>Loans</a></li>

             <li><a class="nav-link" href="{{route('loan.payment')}}"><i class="fas fa-credit-card"></i>Loans Payment</a></li>


          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Reports</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('report')}}">Report</a></li>
            <li><a class="nav-link" href="forms-editor.html">Income Reports</a></li>
            <li><a class="nav-link" href="forms-validation.html">Expenses Reports</a></li>
            <li><a class="nav-link" href="forms-validation.html">Monthly and Yearly</a></li>
          </ul>
        </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>        </aside>
  </div>
