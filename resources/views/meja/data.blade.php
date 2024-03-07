<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nomor Meja</th>
            <th scope="col">Kapasitas</th>
            <th scope="col">Action</th>


        </tr>
    </thead>

    @foreach($mejas as $mej)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $mej->nomor_meja }}</td>
        <td>{{ $mej->kapasitas }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormmeja" data-mode="edit" data-id="{{ $mej->id }}" data-nama_produk="{{ $mej->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('meja.destroy',$mej->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>

        </td>
        </form>
    </tr>
    @endforeach
    </tbody>
</table>