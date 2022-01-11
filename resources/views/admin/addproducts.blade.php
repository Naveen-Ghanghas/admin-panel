@extends('admin.master')
@section('container')
<h2>Add Products</h2>

<div class="container">
@if($message=Session::get('errmsg'))
          <div class="alert alert-success">
              {{$message}}
          </div>
 @endif
  <form method="post" enctype="multipart/form-data"action="{{url('/admin/postaddproducts')}}">
  @csrf()
    <div class="form-group">
      <label>Product Name:</label>
      <input type="text" class="form-control"  name="pname">
    </div>
    @php
$sn=1;
@endphp

    <div class="form-group">
    <label for="exampleFormControlSelect1">select category</label>
    <select class="form-control" name="cid">
    @foreach ($postdata as $post)
      <option value="{{$post->id}}">{{$post['cname']}}</option>
      @php
$sn++;
@endphp
@endforeach
    </select>
  </div>

    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control"  name="price">
    </div>
    <div class="form-group">
      <label>Quantity</label>
      <input type="text" class="form-control"  name="qty">
    </div>
    <div class="form-group">
      <label>Features</label>
      <input type="text" class="form-control"  name="features">
    </div>
    <div class="form-group">
      <label for="pwd">Image:</label>
      <input type="file" class="form-control"  name="file">
    </div>

    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </form>
</div>
@endsection
