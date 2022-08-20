@extends('admin.layouts.sidebar')

@section('container')
<div class="container py-5 px-5">
<form action="/admin/product" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image"><b>Product Photo</b></label>
        <div id="preview"></div>
        <input type="file" class="form-control" name="image" id="image" required >

        <label for="name" class="mt-3"><b>Product Name</b></label>
        <input type="text" class="form-control" id="name" value="" name="name" required>

        <label for="category" class="mt-3"><b>Product Category</b></label>
        <select class="form-select form-select-sm" name="category" required>
            <option selected value="">Choose category</option>
            @foreach ($categories as $category)    
                <option value="{{ $category["id"] }}" class="text-muted">{{ $category["nama"] }}</option>
            @endforeach
        </select>

        <label for="desc" class="mt-3"><b>Description</b></label>
        <textarea class="form-control p-1" id="desc" rows="3" value="" name="desc" required></textarea>

        <label for="price" class="mt-3"><b>Price (IDR)</b></label>
        <div class="d-flex">
            <input type="number" class="form-control text-warning"  id="price" value="" name="price" required>
        </div>
         <table class="table">
             <thead>
               <tr>
                 <th scope="col">Size</th>
                 <th scope="col">Stock</th>
               </tr>
             </thead>
             <tbody>
                 <tr>
                   <td>S</td>
                   <td>
                       <input type="number" name="size_s" class="form-control-plaintext py-1 px-1" value="0" >
                   </td>
                 </tr>
                 <tr>
                   <td>M</td>
                   <td>
                     <input type="number" name="size_m" class="form-control-plaintext py-1 px-1" value="0" >
                   </td>
                 </tr>
                 <tr>
                   <td>L</td>
                   <td>
                     <input type="number" name="size_l" class="form-control-plaintext py-1 px-1" value="0" >
                   </td>
                 </tr>
                 <tr>
                   <td>XL</td>
                   <td>
                     <input type="number" name="size_xl" class="form-control-plaintext py-1 px-1" value="0" >
                   </td>
                 </tr>
               </tbody>
         </table>
        
      <button type="submit" class="btn btn-primary mt-3">Create</button>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto" class="my-1"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
  }
  $("#image").change(function () {
      imagePreview(this);
  })
</script>


@endsection