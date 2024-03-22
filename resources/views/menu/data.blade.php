            <table id="tbl-menu" class="table table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $men)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $men->nama_menu }}</td>
                        <td>{{ $men->harga }}</td>
                        <td>{{ $men->deskripsi }}</td>
                        <td>{{ $men->jenis_id }}</td>
                        <td>
                            <button class="btn" data-toggle="modal" data-target="#modalFormmenu" data-mode="edit"
                                data-id="{{ $men->id }}" data-nama_produk="{{ $men->Nama }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('menu.destroy',$men->id) }}" method="post" style="display:inline"></button>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>