<div class="modal fade" id="modalFormkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nama karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="karyawan">
            <div class="modal-body">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Nama" value="" name="nip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">NIK</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Nama" value="" name="nik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" name="jenis_kelamin">
                            <option value="pria" selected="">Pria</option>
                            <option value="wanita" selected="">Wanita</option>
                            </select>   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="tempat_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                         <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tanggal_lahir" value="" name="tanggal_lahir">
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Nama" value="" name="telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Agama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="agama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status Nikah</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" name="status_nikah">
                            <option value="nikah" selected="">Nikah</option>
                            <option value="belum nikah" selected="">Belum Nikah</option>
                            </select>   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Golongan ID</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Nama" value="" name="golongan_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="foto">
                        </div>
                    </div>
                    <!-- Close the form tag here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            <script>
    // Fungsi untuk mengonversi format tanggal
    function convertDateFormat(inputDate) {
        var dateArray = inputDate.split("-");
        return dateArray[2] + "-" + dateArray[1] + "-" + dateArray[0];
    }

    // Menangkap event submit formulir
    document.querySelector('form').addEventListener('submit', function (event) {
        // Mendapatkan nilai input tanggal
        var tanggalLahirInput = document.getElementById('tanggal_lahir').value;

        // Mengonversi format tanggal
        var tanggalLahirConverted = convertDateFormat(tanggalLahirInput);

        // Menetapkan kembali nilai input tanggal yang sudah dikonversi
        document.getElementById('tanggal_lahir').value = tanggalLahirConverted;

        // Menambahkan input hidden '_method' untuk metode PUT
        var methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PUT');
        this.appendChild(methodInput);
    });
</script>


            
        </div>
    </div>
</div>
