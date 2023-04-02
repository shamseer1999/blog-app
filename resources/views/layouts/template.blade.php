<!DOCTYPE html>
<html lang="en">
<head>
  <title>HexWhale Blog App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .row.content {height: 1500px}
    
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  
  <div class="row content">
    <div class="col-sm-12" style="background-color:#f1f1f1">
      <label for="" style="font-weight:700;font-size:23px;">Blog App</label>
      <a href="{{route('logout')}}" class="btn btn-primary" style="float:right;margin-top:2px;">Logout</a>
    </div>
    <div class="col-sm-2 sidenav">
      {{-- <h4>Blog App</h4> --}}
      <ul class="nav nav-pills nav-stacked" style="margin-top:10px;">
        <li class="{{isset($style) && $style==1 ? 'active' :''}}"><a href="{{route('posts')}}">Blogs</a></li>
        <li class="{{isset($style) && $style==2 ? 'active' :''}}"><a href="{{route('add_post')}}">Add Blog</a></li>
      </ul>
      
    </div>
    
      @if (session()->has('success'))
      <div class="col-sm-10 alert alert-success">
        
          {{session('success')}}
        
        
      </div>

      @endif
    
        @yield('content')
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</body>
</html>
