<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bands</title>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- CSS -->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <style>
        body { padding-top:50px; } /* add some padding to the top of our site */
        #albums_filter {display:none;}
    </style>
</head>
<body class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Literacy Application</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        <li><a href="{{ route('home') }}">Bands</a></li>
        <li><a href="{{ route('albums') }}">Albums</a></li>
    </div>
  </div>
</nav>
<main>
<div class="col-sm-12">
    @yield('content')
</div>
</main>
</body>
</html>