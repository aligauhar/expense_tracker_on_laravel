<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Expense</title>
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
    .graph-container {
      width: 70%;
      float: left;
    }
    .report-container {
      width: 30%;
      float: right;
    }
    .report-container textarea {
      height: 200px;
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
            <a class="nav-link" href="add">Add New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/setting">Settings</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-10 main-content">
        <h2>Add New Expense</h2>
        <form action="{{ route('productadd') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="product-name">Product Name</label>
            <input type="text" name="productname" id="product-name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="product-price">Product Price</label>
            <input type="number" name="productprice" id="product-price" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="product-type">Payment Type</label>
            <select name="paymenttype" id="paymenttype" class="form-control" required>
              <option value="CreditCard">Credit Card</option>
              <option value="Cash">Cash</option>
              <option value="Crypto">Crypto</option>
            </select>
          </div>
          <div class="form-group">
            <label for="product-category">Product Category</label>
            <input type="text" name="productcategory" id="product-category" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Expense</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
