@extends('admin.layouts.sidebar')

@section('container')
<form action="/admin/category/{{ $category->id }}" method="POST">
  @csrf
  @method("PUT")
  <div class="conatiner p-5">
    <div class="mb-3 row">
      <label for="oldCategory" class="col-sm-3 col-form-label"><b> Current Category Name</b></label>
      <div class="col-md-4">
        <input type="text" readonly disabled class="form-control-plaintext col-md-2" id="oldCategory" value="{{ $category["nama"] }}">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="newCategory" class="col-sm-3 col-form-label"><b>New Category Name</b></label>
      <div class="col-md-4">
        <input type="text" class="form-control " id="newCategory" name="newCategoryName">
      </div>
    </div>
      <button class="btn btn-primary" >Update</button>
  </div>
</form>

@endsection