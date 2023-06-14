<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
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

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1>Welcome to Expense Tracker</h1>
            <p>"Take control of your financial well-being and gain peace of mind by managing your expenses efficiently with our powerful expense tracking system. Our user-friendly software allows you to easily track and categorize your expenditures, analyze your spending patterns, and create detailed reports. With our advanced tools and intuitive dashboard, you can stay organized, make informed financial decisions, and achieve your savings goals. Join our satisfied clients who have experienced the benefits of effective expense management."</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <p class="card-text">Create an account to get started.</p>
                    <a href="/register" class="btn btn-primary">Register</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Sign In</h5>
                    <p class="card-text">Already have an account? Sign in here.</p>
                    <a href="login" class="btn btn-primary">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expense Tracking Image -->
<div class="container-fluid">
<img style="margin-left:13%; width:50%"src="{{ asset('img/expensetracking.PNG') }}" alt="Expense Tracking Image">
</div>

<!-- Services -->
<div class="container mt-5">
    <h2>Our Services</h2>
    <p>Manage your expenses with ease using our advanced features:</p>
    <div class="row">
        <div class="col-md-4">
            <h4>Time Frame Graphs</h4>
            <p>Visualize your expenses over different time frames for better analysis.</p>
        </div>
        <div class="col-md-4">
            <h4>Report Generation</h4>
            <p>Generate detailed reports to track your spending patterns and trends.</p>
        </div>
        <div class="col-md-4">
            <h4>Categories</h4>
            <p>Organize your expenses into categories to understand your spending habits.</p>
        </div>
    </div>
</div>

<!-- Clients -->
<div class="container mt-5">
    <h2>Our Clients</h2>
    <p>Join our growing list of satisfied clients:</p>
    <div class="row">
        <div class="col-md-4">
        <img style="height;30%; width:90%" src="{{ asset('img/client 1.PNG') }}" alt="Expense Tracking Image">
     </div>
        <div class="col-md-4">
        <img style="height;30%; width:90%" src="{{ asset('img/client 2.PNG') }}" alt="Expense Tracking Image">
       </div>
        <div class="col-md-4">
        <img style="height;20%; width:90%" src="{{ asset('img/client 3.PNG') }}" alt="Expense Tracking Image">
      </div>
    </div>
</div>

</body>
</html>
