<div class="modal fade" id="modalFormabsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="absensi">
            <div class="modal-body">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="namaKaryawan" class="form-control" id="Nama" value="" name="namaKaryawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="Nama" value="" name="tanggalMasuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="Nama" value="" name="waktu_mulai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" name="status">
                            <option value="sakit" selected="">Sakit</option>
                            <option value="hadir" selected="">Hadir</option>
                            <option value="izin" selected="">Izin</option>
                            </select>   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Selesai</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="Nama" value="" name="waktu_selesai">
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
            </script>
        </div>
    </div>
</div>
