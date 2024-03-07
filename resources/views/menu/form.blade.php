<div class="modal fade" id="modalFormmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nama menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="nama_menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="Nama" value="" name="harga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                           <select name="jenis_id" id="jenis_id">
                            <option value="">Pilih jenis</option>
                            @foreach ($jenis as $jen)
                            <option value="{{ $jen->id }}">{{ $jen->nama_jenis }}</option>
                            @endforeach                 
                           </select>
                        </div>
                    </div>
                    <!-- Close the form tag here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
