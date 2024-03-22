<div class="table-responsive">
    <table class="table table-bordered">
    <thead class="thead-dark">
    <tr class="text-center">
    <th scope="col" style="width: 10% ;">No</th>
    <th scope="col" style="width: 1px;">Nama pelanggan</th>
    <th scope="col" style="width: 1px;">Email</th>
    <th scope="col" style="width: 1px;">NO TELP</th>
    <th scope="col" style="width: 1px;">ALAMAT</th>
    <th scope="col" style="width: 10px;">ACTION</th>

        </tr>
    </thead>

    @foreach($pelanggans as $pel)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $pel->nama }}</td>
        <td>{{ $pel->email }}</td>
        <td>{{ $pel->nomor_telepon }}</td>
        <td>{{ $pel->alamat }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormpelanggan" data-mode="edit" data-id="{{ $pel->id }}" data-nama_produk="{{ $pel->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('pelanggan.destroy',$pel->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>

        </td>
        </form>
    </tr>
    @endforeach
    </tbody>
</table>