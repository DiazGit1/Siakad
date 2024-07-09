@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    <h1>Program Studi</h1>
@stop

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Data Sekolah di Indonesia</h1>
<button id="fetchData" class="btn btn-primary mb-4">Fetch Data Sekolah</button>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Sekolah</th>
            <th scope="col">Alamat</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Kabupaten/Kota</th>
            <th scope="col">Kecamatan</th>
        </tr>
    </thead>

    <tbody id="sekolahData">

    </tbody>
</table>
</div>
    <script>
//         document.getElementById('fetchData').addEventListener('click', function() {
//     fetch('/fetch-sekolah')
//         .then(response => response.json())
//         .then(data => {
//             let sekolahData = document.getElementById('sekolahData');
//             sekolahData.innerHTML = '';
//             data.dataSekolah.forEach((sekolah, index) => {
//                 sekolahData.innerHTML += `
//                     <tr>
//                         <td>${index + 1}</td>
//                         <td>${sekolah.sekolah}</td>
//                         <td>${sekolah.alamat_jalan}</td>
//                         <td>${sekolah.propinsi}</td>
//                         <td>${sekolah.kabupaten_kota}</td>
//                         <td>${sekolah.kecamatan}</td>
//                     </tr>
//                 `;
//             });
//         });
// });
document.addEventListener('DOMContentLoaded', function() {
    fetch('/fetch-sekolah')
        .then(response => response.json())
        .then(data => {
            let sekolahData = document.getElementById('sekolahData');
            sekolahData.innerHTML = '';
            data.dataSekolah.forEach((sekolah, index) => {
                sekolahData.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${sekolah.sekolah}</td>
                        <td>${sekolah.alamat_jalan}</td>
                        <td>${sekolah.propinsi}</td>
                        <td>${sekolah.kabupaten_kota}</td>
                        <td>${sekolah.kecamatan}</td>
                    </tr>
                `;
            });
        });
});
    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
