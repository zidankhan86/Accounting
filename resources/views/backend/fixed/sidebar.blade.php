<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Accounting</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{route('home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Accounts</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('account.type')}}">Accounts Type</a></li>

            <li><a class="nav-link" href="{{route('add.account')}}">Accounts Setup</a></li>

            <li><a class="nav-link" href="{{route('account.list')}}">List Accounts</a></li>

            <li><a class="nav-link" href="layout-top-navigation.html">Cash Flow</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Manage Expenses</span></a>
          <ul class="dropdown-menu">

            <li><a class="nav-link" href="{{route('manage.expense')}}">Expenses type</a></li>

            <li><a class="nav-link" href="{{route('add.expense')}}">Add Expenses</a></li>

            <li><a class="nav-link" href="{{route('expense.list')}}">Expenses List</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Manage Loan
        </span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link beep beep-sidebar" href="{{route('add.authorities')}}">Add Authorities </a></li>
            <li><a class="nav-link beep beep-sidebar" href="{{route('authorities.list')}}">Authorities List </a></li>


            <li><a class="nav-link" href="{{route('add.loan.type')}}">Loan Types</a></li>

             <li><a class="nav-link beep beep-sidebar" href="{{route('add.loan')}}">Add Loan </a></li>

             <li><a class="nav-link" href="{{route('loan.list')}}">List Loans</a></li>

            <li><a class="nav-link beep beep-sidebar" href="components-hero.html">VAT & TAX</a></li>

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
