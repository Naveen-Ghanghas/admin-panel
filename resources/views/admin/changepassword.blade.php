@extends('admin.master')
@section('container')
<h2>Change password</h2>
@if($message=Session::get('errmsg'))
          <div class="alert alert-danger">
              {{$message}}
          </div>
 @endif
@if($message=Session::get('succmsg'))
          <div class="alert alert-success">
              {{$message}}
          </div>
 @endif
<form method="post" action="{{url('/admin/postchangepass')}}">
@csrf()
  <div class="form-group">
    <label> Old Password </label>
    <input type="password" name="op" class="form-control"/>
  </div>
  <div class="form-group">
    <label> New Password </label>
    <input type="password" name="np" class="form-control"/>
  </div>
  <div class="form-group">
    <label> Confirm Password </label>
    <input type="password" name="cp" class="form-control"/>
  </div>
  <input type="submit" name="sub" class="btn btn-primary" value="Submit"/>
</form>
@endsection
