<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>
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
    .alert-button {
      margin-bottom: 20px;
    }
    .expense-limit-container {
      margin-top: 30px;
    }
    .expense-limit-container .form-control {
      width: 200px;
      display: inline-block;
      margin-right: 10px;
    }
    .red-line {
      height: 3px;
      background-color: red;
      margin-top: 10px;
    }
    .message {
      margin-top: 10px;
      color: red;
      font-weight: bold;
    }
    .green {
    color: green;
    }

      .red {
          color: red;
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
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add">Add New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/setting">Settings</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-10 main-content">
        <div class="alert-button">
          <button type="button" class="btn btn-danger">Alert</button>
        </div>
        <div class="expense-limit-container">
          <h2>Set Maximum Expense Limit</h2>
          <form id="limitForm" method="POST" action="{{ route('setExpenseLimit') }}">
            @csrf
            <div class="form-group">
              <label for="expenseLimit">Enter Maximum Limit:</label>
              <input type="number" class="form-control" id="expenseLimit" name="expenseLimit" placeholder="Enter amount">
              <div class="red-line"></div>
              <div class="message" id="message"></div>
            </div>
            <button type="submit" class="btn btn-danger">Check Limit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#limitForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var expenseLimit = $('#expenseLimit').val();

        $.ajax({
            type: 'POST',
            url: '{{ route("setExpenseLimit") }}',
            data: {
                _token: '{{ csrf_token() }}',
                expenseLimit: expenseLimit,
            },
            success: function(response) {
                var message = response.message;
                var color = response.color;

                $('#message').text(message).removeClass().addClass(color);
            },
            error: function() {
                $('#message').text('Error occurred while checking the limit.');
            }
        });
    });
});


  </script>
</body>
</html>
