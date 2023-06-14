<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expense Tracker</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
    </ul>
</nav>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card mt-5">
          <div class="card-header">
            <h3 class="text-center">Registration</h3>
          </div>
          <div class="card-body">
            <form action="/register2" method="POST">
            @csrf
              <div class="form-group">
                
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            Already have an account? <a href="/login">Login here</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
