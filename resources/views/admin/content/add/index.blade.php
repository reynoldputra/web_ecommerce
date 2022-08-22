@extends('admin.layouts.sidebar')

@section('container')

<div class="p-3">
  <div class="px-1">
    <a href="/admin/add/create"><button class="btn btn-primary my-3">Add Admin</button></a>
    <p class="fst-italic">Only super admin can view and add admin list</p>
  </div>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">No</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                <td>{{ $admin["email"] }}</td>
                <td>{{ $admin["username"] }}</td>
                <td>{{ $admin["name"] }}</td>
                <td>{{ $admin["nomor_telepon"] }}</td>
                <td>
                <form action="/admin/add/{{ $admin["id"] }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>  
              
                </td>
              </tr>
            @endforeach
          
        </tbody>
      </table>    
</div>
@endsection

