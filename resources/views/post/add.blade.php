@extends('layouts.template')
@section('content')
<div class="col-sm-10">
    <h4><small>ADD POST</small></h4>
    <hr>
    <div class="row">
      <div class="col-md-10">
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return check()">
          @csrf
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Blog Title">
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" cols="10" rows="8" class="form-control" placeholder="Enter Your Blog"></textarea>
          </div>
          <div class="form-group">
            <label for="">Author</label>
            <select name="author" id="author" class="form-control">
              <option value="">-- SELECT --</option>
              @if (!empty($authors))
                  @foreach ($authors as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Add Blog" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function check()
    {
      if($("#title").val() =="")
      {
        alert("Title field is required");
        return false;
      }
      if($("#description").val() =="")
      {
        alert("Description field is required")
        return false;
      }
      if($("#author").val() =="")
      {
        alert("Please choose an author")
        return false;
      }
      
    }
  </script>
@endsection