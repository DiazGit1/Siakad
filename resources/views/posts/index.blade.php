@extends('adminlte::page')

@section('title', 'Program Studi')

@section('content_header')
    <h1>Program Studi</h1>
@stop

@section('content')
  <p>Data Program Studi</p>
  <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tambah Program Studi</a>
  <table class="table table-striped">
      <thead>
          <tr>
              <th scope="col">Kode Prodi</th>
              <th scope="col">Nama Prodi</th>
              <th scope="col">Nama Fakultas</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($posts as $item)
              <tr>
                  <td>{{ $item->kode_prodi }}</td>
                  <td>{{ $item->nama_prodi }}</td>
                  <td>{{ $item->fakultas ? $item->fakultas->nama_fakultas : 'N/A' }}</td>
                  <td>
                      <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('posts.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop