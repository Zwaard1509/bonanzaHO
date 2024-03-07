<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama jenis</th>
            <th scope="col">jenis ID</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    @foreach($jenis as $jen)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $jen->nama_jenis }}</td>
        <td>{{ $jen->kategori_id }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormjenis" data-mode="edit" data-id="{{ $jen->id }}" data-nama_produk="{{ $jen->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('jenis.destroy',$jen->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>