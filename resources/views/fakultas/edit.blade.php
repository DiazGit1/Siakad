<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Fakultas - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('fakultas.update', $dataFakultas->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Fakultas</label>
                                <input type="text" class="form-control @error('nama_fakultas') is-invalid @enderror" name="nama_fakultas" value="{{ old('nama_fakultas', $dataFakultas->nama_fakultas) }}" placeholder="Masukkan Nama Fakultas">
                            
                                <!-- error message untuk nama_fakultas -->
                                @error('nama_fakultas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pimpinan Fakultas</label>
                                <input type="text" class="form-control @error('pimpinan_fakultas') is-invalid @enderror" name="pimpinan_fakultas" value="{{ old('pimpinan_fakultas', $dataFakultas->pimpinan_fakultas) }}" placeholder="Masukkan Nama Pimpinan Fakultas">
                            
                                <!-- error message untuk pimpinan_fakultas -->
                                @error('pimpinan_fakultas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <a href="{{ route('fakultas.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
