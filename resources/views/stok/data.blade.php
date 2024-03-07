<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">ID Menu</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
            
        </tr>
    </thead>

    @foreach($stoks as $st)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $st->menu_id }}</td>
        <td>{{ $st->jumlah }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormstok" data-mode="edit" data-id="{{ $st->id }}" data-nama_produk="{{ $st->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('stok.destroy',$st->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>

        </td>
        </form>
    </tr>
    @endforeach
    </tbody>
</table>