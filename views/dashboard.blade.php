<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker - Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
      height: 100vh;
    }
    .sidebar h3 {
      margin-bottom: 30px;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 10px;
    }
    .sidebar a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .sidebar a:hover {
      color: #007bff;
    }
    .main-content {
      padding: 20px;
    }
    .report-container {
      width: 100%;
    }
    .report-container h2 {
      margin-bottom: 20px;
    }
    .timeframe-buttons {
      margin-top: 20px;
    }
    #expenseTable th,
    #expenseTable td {
      padding: 10px;
    }
    #expenseTable thead {
      background-color: #f8f9fa;
    }
    #expenseTable tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }
    #expenseTable tbody td {
      border-bottom: 1px solid #dee2e6;
    }
  </style>
</head>
<body>
  
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Expense Tracker</a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
    @php
      $userId = session('id');
      $loggedIn = !is_null($userId);
    @endphp
    @if ($loggedIn)
      @php
        $user = \App\Models\User::find($userId);
      @endphp
      <li class="nav-item"><span class="nav-link">Logged in as {{ $user->name }}</span></li>
      <li class="nav-item">
      <form id="logoutForm" action="{{ route('logout') }}" method="POST">
  @csrf
  <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
</form>

      </li>
    @else
      <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
    @endif
  </ul>
</nav>



  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 sidebar">
        <h3>Expense Tracker</h3>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add">Add New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/setting">Settings</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-10 main-content">
        <div class="report-container">
          <h2>Expense Report</h2>
          <div class="timeframe-buttons">
            <button type="button" class="btn btn-primary" onclick="generateReport('weekly')">Weekly</button>
            <button type="button" class="btn btn-primary" onclick="generateReport('monthly')">Monthly</button>
            <button type="button" class="btn btn-primary" onclick="generateReport('daily')">Daily</button>
          </div>
          <table id="expenseTable" class="table table-striped">
            <thead>
      
            </thead>
            <tbody id="expenseTableBody">
              <!-- Expenses will be dynamically populated here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  // Function to generate the report based on the selected timeframe
  function generateReport(timeframe) {
    // Get the report elements
    var reportElement = $('#expenseTableBody');

    // Show loading message
    reportElement.html('<tr><td colspan="2">Generating report...</td></tr>');

    // Send an AJAX request to the server
    $.ajax({
      url: '/generate-report',
      method: 'GET',
      data: { timeframe: timeframe },
      success: function (response) {
        // Update the report with the received data
        reportElement.html(response.reportData);
      },
      error: function () {
        // Show error message if the request fails
        reportElement.html('<tr><td colspan="2">Failed to generate report.</td></tr>');
      }
    });
  }

  $(document).ready(function () {
    // Attach click event listeners to the buttons
    $('#weekly').click(function () {
      generateReport('weekly');
    });

    $('#monthly').click(function () {
      generateReport('monthly');
    });

    $('#daily').click(function () {
      generateReport('daily');
    });
  });
</script>

</body>
</html>