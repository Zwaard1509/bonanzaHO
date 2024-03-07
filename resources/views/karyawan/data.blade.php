<table class="table">
    <thead class="thead-dark" >
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">NIK</th>
            <th scope="col">jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Telepon</th>
            <th scope="col">Agama</th>
            <th scope="col">Status Nikah</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>


        </tr>
    </thead>

    @foreach($karyawan as $kar)
    <tr class="text-center">
        <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
        <td>{{ $kar->nip }}</td>
        <td>{{ $kar->nik }}</td>
        <td>{{ $kar->jenis_kelamin }}</td>
        <td>{{ $kar->tempat_lahir }}</td>
        <td>{{ $kar->tanggal_lahir }}</td>
        <td>{{ $kar->telepon }}</td>
        <td>{{ $kar->agama }}</td>
        <td>{{ $kar->status_nikah }}</td>
        <td>{{ $kar->alamat }}</td>

        <td>
            <button class="btn" data-toggle="modal" data-target="#modalFormkaryawan" data-mode="edit" data-id="{{ $kar->id }}" data-nama_produk="{{ $kar->Nama }}">
                <i class="fas fa-edit"></i>
            </button>
            <form action="{{ route('karyawan.destroy',$kar->id) }}" method="post" style="display:inline"></button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn- btn-danger btn-delete"><i class="fas fa-trash"></i></button>

        </td>
        </form>
    </tr>
    @endforeach
    </tbody>
</table>