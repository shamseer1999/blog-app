@extends('layouts.template')
@section('content')
<div class="col-sm-10">
    <h4><small>LIST POST</small></h4>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Sl.No</th>
              <th scope="col">Blog Title</th>
              <th scope="col">Author</th>
              <th scope="col">Status</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (sizeof($results) > 0)
                @foreach ($results as $item)
                <tr>
                  <th scope="row">{{$results->firstItem() + $loop->index}}</th>
                  <td>{{$item->title}}</td>
                  <td>{{$item->author->name}}</td>
                  <td>
                    @if ($item->status ==1)
                        {{"Active"}}
                        @else
                        {{"Inactive"}}
                    @endif
                  </td>
                  <td>{{date('Y-m-d',strtotime($item->created_at))}}</td>
                  <td style="padding:5px;">
                    <a href="{{route('view_post',encrypt($item->id))}}" title="View"><i class="fa fa-eye" style="font-size:18px"></i></a>
                    <a href="{{route('edit_post',encrypt($item->id))}}" title="Edit"><i class="fa fa-pencil" style="font-size:18px"></i></a>          
                    <a href="{{route('delete_post',encrypt($item->id))}}" title="Delete" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-close" style="font-size:18px"></i></a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="6">No record found!</td>
                </tr>
            @endif
            
          </tbody>
        </table>
        {{$results->links()}}
      </div>
    </div>
  </div>
@endsection