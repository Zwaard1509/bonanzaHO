<div class="modal fade" id="modalFormjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nama jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="jenis">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama jenis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" value="" name="nama_jenis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori_id" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                           <select name="kategori_id" id="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kan)
                            <option value="{{ $kan->id }}">{{ $kan->name }}</option>
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

<div class="modal fade" id="JenisImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('import-jenis')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf


                    <input type="file" name="import" id="import">


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>

    </div>
</div>
