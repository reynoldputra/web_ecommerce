@extends('admin.layouts.sidebar')

@section('container')
<div class="container py-5 px-5">
<form action="/admin/product/{{ $product["id"] }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <label for="image"><b>Product Photo</b></label>
        <div id="preview">
        @if($product["gambar"])
          <img id="old_img" src="{{ asset('storage/product/'.$product["gambar"]) }}" width="300" height="auto" class="my-1"/>
        @endif
        </div>
          <input type="file" class="form-control" name="image" id="image" >

        <label for="name" class="mt-3"><b>Product Name</b></label>
        <input type="text" class="form-control" id="name" value="{{ $product["nama"] }}" name="name" required>

        <label for="category" class="mt-3"><b>Product Category</b></label>
        <select class="form-select form-select-sm" name="category" required>
            @foreach ($categories as $category)    
                <option value="{{ $category["id"] }}" class="text-muted" <?php if($category["id"] == $product["category_id"]) ECHO "selected"; ?>>{{ $category["nama"] }}</option>
            @endforeach
        </select>

        <label for="desc" class="mt-3"><b>Description</b></label>
        <textarea class="form-control p-1" id="desc" rows="3" value="" name="desc" required>{{ $product["deskripsi"] }}</textarea>

        <label for="price" class="mt-3"><b>Price (IDR)</b></label>
        <div class="d-flex">
            <input type="number" class="form-control text-warning"  id="price" value="{{ $product["harga"] }}" name="price" required>
        </div>
         <table class="table mt-3">
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
                    <?php 
                        $result = 0;
                        foreach($product["detail_product"] as $data){
                          if($data["size_id"] == 1){
                            ECHO '<input name="size_s" type="text" class="form-control-plaintext py-1 px-1" value="'.$data["stock"].'" >';
                            $result = 1;
                            break;
                          }
                        }
                        if (!$result) ECHO '<input name="size_s" type="text" class="form-control-plaintext py-1 px-1" value="0" >';
                    ?>
                   </td>
                 </tr>
                 <tr>
                   <td>M</td>
                   <td>
                      <?php 
                          $result = 0;
                          foreach($product["detail_product"] as $data){
                            if($data["size_id"] == 2){
                              ECHO '<input name="size_m" type="text" class="form-control-plaintext py-1 px-1" value="'.$data["stock"].'" >';
                              $result = 1;
                              break;
                            }
                          }
                          if (!$result) ECHO '<input name="size_m" type="text" class="form-control-plaintext py-1 px-1" value="0" >';
                      ?>
                   </td>
                 </tr>
                 <tr>
                   <td>L</td>
                   <td>
                    <?php 
                        $result = 0;
                        foreach($product["detail_product"] as $data){
                          if($data["size_id"] == 3){
                            ECHO '<input name="size_l" type="text" class="form-control-plaintext py-1 px-1" value="'.$data["stock"].'" >';
                            $result = 1;
                            break;
                          }
                        }
                        if (!$result) ECHO '<input name="size_l" type="text" class="form-control-plaintext py-1 px-1" value="0" >';
                    ?>
                   </td>
                 </tr>
                 <tr>
                   <td>XL</td>
                   <td>
                    <?php 
                      $result = 0;
                      foreach($product["detail_product"] as $data){
                        if($data["size_id"] == 4){
                          ECHO '<input name="size_xl" type="text" class="form-control-plaintext py-1 px-1" value="'.$data["stock"].'" >';
                          $result = 1;
                          break;
                        }
                      }
                      if (!$result) ECHO '<input name="size_xl" type="text" class="form-control-plaintext py-1 px-1" value="0" >';
                  ?>   
                  </td>
                 </tr>
               </tbody>
         </table>
        
      <button type="submit" class="btn btn-primary mt-3">Update</button>
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