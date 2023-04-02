@extends('layouts.template')@extends('layouts.template')
@section('content')
<div class="col-sm-8">
    <h4><small>VIEW POST</small></h4>
    <hr>
    <h2>{{$view_data->title}}</h2>
    <h5><span class="glyphicon glyphicon-time"></span> Post by {{$view_data->author->name}}, {{date('d.M.Y',strtotime($view_data->created_at))}}.</h5>
    <br>
    
    <p>{{$view_data->description}}</p>
    
  </div>
@endsection