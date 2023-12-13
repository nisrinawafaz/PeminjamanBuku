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
    <style>
        .detail {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            padding: 70px;
            flex-direction: row;
            align-items: center;
        }

        .tengah {
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 40px
        }

        .sisi {
            padding-top: 80px
        }

        .green {
            background-color: #198754;
            height: 100%
        }

        .gap {
            margin-top: 20px
        }
    </style>
</head>

<body>
    <div class="detail">
        <form method="post" action="{{ route('sewa.add') }}" enctype="multipart/form-data" id="formCheckout">
            @csrf <div class="card card-primary detail">
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
                                            value="{{ $buku->harga_harian }}" required="required"
                                            autocomplete="hargaBuku">
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
                                <div class="row gap">
                                    <div class="col">
                                        <label for="inputLamaSewa">Judul Buku</label>
                                        <input type="number" id="inputLamaSewa" name="lamaSewa"
                                            class="form-control @error('lamaSewa') is-invalid @enderror"
                                            placeholder="{{ $buku->judul }}" required="required" autocomplete="lamaSewa"
                                            disabled>
                                        @error('lamaSewa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="inputLamaSewa">Harga Harian</label>
                                        <input type="number" id="inputLamaSewa" name="lamaSewa"
                                            class="form-control @error('lamaSewa') is-invalid @enderror"
                                            placeholder="{{ $buku->harga_harian }}" required="required"
                                            autocomplete="lamaSewa" disabled>
                                        @error('lamaSewa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gap">
                                    <div class="col">
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
                                    <div class="col">
                                        <label for="inputBank">Bank</label>
                                        <select id="inputBank" name="bank"
                                            class="form-control @error('bank') is-invalid @enderror"
                                            required="required">
                                            <option value="" disabled selected>-- Pilih Bank --</option>
                                            <option value="BRI" {{ old('bank')=='BRI' ? 'selected' : '' }}>BRI</option>
                                            <option value="BCA" {{ old('bank')=='BCA' ? 'selected' : '' }}>BCA</option>
                                            <option value="MANDIRI" {{ old('bank')=='MANDIRI' ? 'selected' : '' }}>
                                                MANDIRI
                                            </option>
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
                        <div class="row">

                            <div>
                                <button type="button" class="btn btn-success tengah " data-bs-toggle="modal"
                                    data-bs-target="#checkoutModal">Checkout</button>
                            </div>
                        </div>
        </form>
    </div>

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

    <!-- Modal code -->
    <div class="modal fade" id="kodeModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Konfirmasi Checkout</h5>
                </div>
                <div class="modal-body">
                    <p>Berikut Adalah Kode Anda : 1549 098765234256</p>
                </div>
                <div class="modal-footer">
                    <!-- Tombol untuk menutup modal -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="redirectToPage()">OK</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('checkout').addEventListener('click', function () {
            event.preventDefault();

            // Buka modal
            openNewModal();

            // Kirim formulir setelah modal terbuka
            submitForm();


        });

        function submitForm() {
            // Gantilah dengan URL formulir yang sesuai
            const formUrl = '{{ route("sewa.add") }}';

            const formData = new FormData(document.getElementById('formCheckout'));

            fetch(formUrl, {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Form submission failed');
                    }
                    return response.json();
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        }
        function openNewModal() {
            // Menggunakan ID modal baru (gantilah dengan ID modal yang sesuai)
            var newModal = new bootstrap.Modal(document.getElementById('kodeModal'));
            newModal.show();
        }

        function redirectToPage() {
            // Redirect to another page
            window.location.href = '{{ route('etalaseBuku.etalaseBuku') }}'; // Ganti URL dengan tujuan yang diinginkan
        }
    </script>
</body>

</html>