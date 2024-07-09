<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" >
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">KODE PRODI</label>
                                <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" name="kode_prodi" value="{{ old('kode_prodi') }}" placeholder="Masukkan Kode Prodi">
                            
                                <!-- error message untuk title -->
                                @error('kode_prodi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA PRODI</label>
                                <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi" value="{{ old('nama_prodi') }}" placeholder="Masukkan Nama Prodi">
                            
                                <!-- error message untuk title -->
                                @error('nama_prodi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">ID FAKULTAS</label>
                                <select class="form-control select3" style="width: 100%;" name="fakultas_id" id="fakultas_id"> 
                                <option disabled value>PILIH FAKULTAS</option>
                                @foreach ($fak as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                                @endforeach
                                </select>
                                                            
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</body>
</html>