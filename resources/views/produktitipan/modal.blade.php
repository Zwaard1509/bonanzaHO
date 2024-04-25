<!-- modal input -->
<div class="modal fade" id="modalFormproduktitipan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INFO produktitipan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="produktitipan">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="NamaProduk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="NamaProduk" value="" name="nama_produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaSupplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="NamaSupplier" value="" name="nama_supplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="HargaBeli" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga_beli" value="" name="harga_beli">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="HargaJual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga_jual" value="" name="harga_jual">
                        </div>
                    </div>
                    <div class="form-group row" id="stokField">
                        <label for="Stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <div id="stokValue">
                            <input type="number" class="form-control" id="stok" value="" name="stok">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Keterangan" value="" name="keterangan">
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

<div class="modal fade" id="formproduktitipanImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('import-produktitipan')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
            </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategori">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </form>
        </div>
