@extends('admin.layouts.sidebar')

@section('container')

<div class="main-box px-5 py-3">


    <div class="header mb-3">
        <a href="/admin/category/create"><div class="btn btn-primary">Add Category</div></a>
    </div> 
        <?php 
            if (session('error') != NULL) {
                ECHO "<div>".session('error')."</div>";
            }
        ?>
       
        <div class="list-group col-md-6">
            @foreach ($categories as $category)
                <div class="d-flex">
                    <button type="button" class="list-group-item list-group-item-action" aria-current="true">
                        <b>{{ $category["nama"] }} </b>
                    </button>
                    <div class="d-flex">
                        <a href="/admin/category/{{ $category["id"] }}/edit" class="my-1 m-3"><span class="badge bg-warning p-1" style="height:30px; width:35px;"><i data-feather="edit-2" style="height:20px; width:20px;"></i></span></a>
                        <form action="/admin/category/{{ $category["id"] }}"  method="post" class="d-inline my-1">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent text-primary" style="height:30px; width:30px;"><span class="badge bg-danger"><i data-feather="trash" style="height:20px; width:20px;"></i></span></button>  
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    
</div>
@endsection