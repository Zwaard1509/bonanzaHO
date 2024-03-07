<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Nama Supllier</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Stok</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>


        </tr>
    </thead>

    @foreach($produktitipans as $prt)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $prt->nama_produk }}</td>
        <td>{{ $prt->nama_supplier }}</td>
        <td>{{ $prt->harga_jual }}</td>
        <td>{{ $prt->harga_beli }}</td>
        <td>{{ $prt->stok }}</td>
        <td>{{ $prt->keterangan }}</td>

        <!-- button action -->
        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormproduktitipan" data-mode="edit" data-id="{{ $prt->id }}" data-nama_produk="{{ $prt->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('produktitipan.destroy',$prt->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>