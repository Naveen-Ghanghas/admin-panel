@extends('admin.master')
@section('container')
<h2>Category</h2>

<div class="container">
@if($message=Session::get('errmsg'))
          <div class="alert alert-success">
              {{$message}}
          </div>
 @endif
  <form method="post" enctype="multipart/form-data"action="{{url('/admin/postaddcategory')}}">
  @csrf()
    <div class="form-group">
      <label>Category Name:</label>
      <input type="text" class="form-control"  name="cname">
    </div>
    <div class="form-group">
      <label for="pwd">Image:</label>
      <input type="file" class="form-control"  name="file">
    </div>

    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </form>
</div>
@endsection
