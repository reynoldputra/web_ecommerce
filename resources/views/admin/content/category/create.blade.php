@extends('admin.layouts.sidebar')

@section('container')
<form action="/admin/category" method="POST">
  @csrf
  <div class="conatiner p-5">   
    <div class="mb-3 row">
      <label for="newCategory" class="col-sm-3 col-form-label"><b>New Category</b></label>
      <div class="col-md-4">
        <input type="text" class="form-control " id="newCategory" name="newCategory">
      </div>
    </div>
      <button class="btn btn-primary" >Create</button>
  </div>
</form>

@endsection