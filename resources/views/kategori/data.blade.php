<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama kategori</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    @foreach($kategoris as $kat)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $kat->name }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormKategori" data-mode="edit" data-id="{{ $kat->id }}" data-nama_produk="{{ $kat->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('kategori.destroy',$kat->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>

        </td>
        </form>
    </tr>
    @endforeach
    </tbody>
</table>