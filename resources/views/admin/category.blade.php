@extends('admin.master')
@section('container')
<h2>Category</h2>
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
    <th colspan="4"><a href="{{url('/admin/addcategory')}}" class="btn btn-danger">Add Category</a></th>
    </tr>
      <tr>
        <th>Sr No.</th>
        <th>Category Name</th>
        <th>Category Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <tr>
      @php
$sn=1;
@endphp
@foreach ($postdata as $post)

<tr>
    <td>{{$sn}}</td>
    <td>{{$post['cname']}}</td>
    <td><img src="{{asset('public/uploads/'.$post->image)}}" width="50" height="50"></td>

    <td>
        <a class="btn btn-success"  href="{{url('/admin/editcat/'.$post->id)}}">Edit</a>
        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')"
         href="{{url('/admin/delcat/'.$post->id)}}">Delete</a>
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
