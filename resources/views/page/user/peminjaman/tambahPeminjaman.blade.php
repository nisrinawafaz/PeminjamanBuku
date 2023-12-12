<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a24cb4a13.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Tampilan Data Buku -->
    <div class="card">
        <div>
            <!-- Sesuaikan dengan struktur data buku Anda -->
            <h2>{{ $buku->judul }}</h2>
            <p>Genre: {{ $buku->genre->nama_genre }}</p>
            <p>Harga Harian: {{ $buku->harga_harian }}</p>
            <!-- Tambahkan elemen-elemen lain sesuai kebutuhan -->
        </div>
    </div>
    <form method="post" action="{{ route('sewa.add') }}" enctype="multipart/form-data" id="formCheckout">
        @csrf <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Informasi Data Diri</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group" hidden>
                                    <input type="text" id="idBuku" name="idBuku"
                                        class="form-control @error('idBuku') is-invalid @enderror"
                                        value="{{ $buku->idBuku }}" required="required" autocomplete="idBuku">
                                    @error('idBuku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group" hidden>
                                    <input type="text" id="hargaBuku" name="hargaBuku"
                                        class="form-control @error('hargaBuku') is-invalid @enderror"
                                        value="{{ $buku->harga_harian }}" required="required" autocomplete="hargaBuku">
                                    @error('hargaBuku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group" hidden>
                                    <input type="text" id="idUser" name="idUser"
                                        class="form-control @error('idUser') is-invalid @enderror"
                                        value="{{Auth::user()->id}}" required="required" autocomplete="idUser">
                                    @error('idUser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputLamaSewa">Lama Sewa</label>
                                    <input type="number" id="inputLamaSewa" name="lamaSewa"
                                        class="form-control @error('lamaSewa') is-invalid @enderror"
                                        placeholder="berapa hari" value="{{ old('lamaSewa') }}" required="required"
                                        autocomplete="lamaSewa">
                                    @error('lamaSewa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputBank">Bank</label>
                                    <select id="inputBank" name="bank"
                                        class="form-control @error('bank') is-invalid @enderror" required="required">
                                        <option value="" disabled selected>-- Pilih Bank --</option>
                                        <option value="BRI" {{ old('bank')=='BRI' ? 'selected' : '' }}>BRI</option>
                                        <option value="BCA" {{ old('bank')=='BCA' ? 'selected' : '' }}>BCA</option>
                                        <option value="MANDIRI" {{ old('bank')=='MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                                        <option value="BSI" {{ old('bank')=='BSI' ? 'selected' : '' }}>BSI</option>
                                    </select>
                                    @error('bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#checkoutModal">Checkout</button>
                    </div>
                </div>
    </form>

    <!-- Modal Checkout -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Konfirmasi Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin checkout?</p>
                </div>
                <div class="modal-footer">
                    <!-- Tombol untuk menutup modal -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <!-- Tombol untuk melakukan checkout -->
                    <button type="button" id="checkout" class="btn btn-success">Ya, Checkout</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('checkout').addEventListener('click', function () {
            // Kirim formulir ketika tombol "Ya" diklik
            document.forms["formCheckout"].submit();
        });
    </script>
</body>

</html>