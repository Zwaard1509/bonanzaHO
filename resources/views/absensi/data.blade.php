<table id="tbl-absu" class="table table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jam Keluar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensi as $abs)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $abs->namaKaryawan }}</td>
                        <td>{{ $abs->tanggalMasuk }}</td>
                        <td>{{ $abs->waktu_mulai }}</td>
                        <td>{{ $abs->status}}</td>
                        <td>{{ $abs->waktu_selesai }}</td>
                        <td>
                            <button class="btn" data-toggle="modal" data-target="#modalFormabsensi" data-mode="edit"
                                data-id="{{ $abs->id }}" data-namaKaryawan="{{ $abs->namaKaryawan}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('absensi.destroy',$abs->id) }}" method="post" style="display:inline"></button>
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