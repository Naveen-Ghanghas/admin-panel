@extends('admin.master')
@section('container')
<h2>Products</h2>

<div class="container">

@if($message=Session::get('succmsg'))
          <div class="alert alert-success">
              {{$message}}
          </div>
 @endif
 @if($message=Session::get('errormsg'))
          <div class="alert alert-success">
              {{$message}}
          </div>
 @endif
<table class="table table-hover" >
    <thead>
    <tr>
    <th colspan="7"><a href="{{url('/admin/addproducts')}}" class="btn btn-danger">Add Products</a></th>
    </tr>
      <tr>
        <th>Sr No.</th>
        <th>Products Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Features</th>
        <th>Image</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>


      @php
 $sn=1;
@endphp
@foreach ($postdata as $post)

<tr>
    <td>{{$sn}}</td>
    <td>{{$post['pname']}}</td>
    <td>{{$post['price']}}</td>
    <td>{{$post['quantity']}}</td>
    <td>{{$post['features']}}</td>
    <td><img src="{{asset('public/uploads/'.$post->image)}}" width="50" height="50"></td>

    <td>
        <a class="btn btn-success"  href="{{url('/admin/editproduct/'.$post->id)}}">Edit</a>
        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')"
         href="{{url('/admin/delproduct/'.$post->id)}}">Delete</a>
    </td>
</tr>
</tbody>
 @php
$sn++;
@endphp
@endforeach

  </table>
  </div>
@endsection
