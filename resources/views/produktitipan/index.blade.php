@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">produk titipan</h3>

        </div>

        <div class="card-body">
            @if(session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            @endif

            @if($errors->any())
            <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormproduktitipan"
                style="margin-top: 2px;">
                Tambah produk titipan!
            </button>
            <a href="{{ route('export-produktitipan') }}" class="btn-btn success">
                <i class="fa fa-file-excel"></i>Export Masseh
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formproduktitipanImport">
                <i class="fas fa-file-excel"></i>Import
            </button>

        </div>
        <div class="mb-2">
            @include('produktitipan.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
    @include('produktitipan.modal')
    </div>
    <!-- /.card -->

</section>
@endsection

@push('script')
<script>
$('#success-alert').fadeTo(500, 500).slideUp(500, function() {
    $('#success-alert').slideUp(500);
});

$('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
    $('#error-alert').slideUp(500);
});

$(function() {
    $('#tbl-produktitipan').DataTable(); // Corrected the DataTable initialization
});

// dialog untuk Hapus Data
$('.btn-delete').on('click', function() {
    var data = $(this).data(); // Mengambil data dari tombol delete
    Swal.fire({
        title: "Are you sure?",
        text: data.message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika tombol "Delete" diklik, tambahkan kode untuk melakukan penghapusan data
            // Misalnya, menggunakan AJAX untuk mengirim permintaan penghapusan ke server
            $.ajax({
                url: data.url, // Ubah dengan URL yang benar untuk penghapusan data
                method: 'DELETE',
                success: function(response) {
                    // Tampilkan pesan sukses jika data berhasil dihapus
                    Swal.fire('Deleted!', 'Your data has been deleted.', 'success');
                    // Reload halaman atau update tampilan data jika diperlukan
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error jika terjadi kesalahan saat menghapus data
                    Swal.fire('Error!', 'Failed to delete data.', 'error');
                    console.error(xhr.responseText);
                }
            });
        } else if (result.isDismissed) {
            // Jika tombol "Cancel" diklik atau dialog ditutup, tidak lakukan apa-apa
            // Anda dapat menambahkan kode lain di sini jika diperlukan
        }
    });
});



$('#modalFormproduktitipan').on('show.bs.modal', function(e) {
    const btn = $(e.relatedTarget);
    console.log(btn.data('mode'));
    const mode = btn.data('mode');
    const nama_produktitipan = btn.data('nama_produktitipan');
    const id = btn.data('id');
    const modal = $(this);
    if (mode === 'edit') {
        modal.find('.modal-title').text('Edit Data produk titipan');
        modal.find('#Nama').val(nama_produktitipan); // Assuming your input field has the id "Nama"
        modal.find('.modal-body form').attr('action', '{{ url("produktitipan") }}/' + id);
        modal.find('#method').html('@method("PUT")');
    } else {
        modal.find('.modal-title').text('Input Data produktitipan');
        modal.find('#Nama').val(''); // Clear the input field for new entries
        modal.find('#method').html('');
        modal.find('.modal-body form').attr('action', '{{ url("produktitipan") }}');
    }
});

document.getElementById('stok').addEventListener('dblclick', function() {
        // Mendapatkan nilai stok saat ini
        let currentStok = this.innerHTML;

        // Membuat input teks untuk mengubah stok
        let inputStok = document.createElement('input');
        inputStok.type = 'number';
        inputStok.className = 'form-control';
        inputStok.value = currentStok;

        // Mengganti elemen stok dengan input teks
        this.innerHTML = '';
        this.appendChild(inputStok);

        // Focus pada input teks
        inputStok.focus();

        // Event listener untuk menangani penekanan tombol "Enter"
        inputStok.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                // Mendapatkan nilai yang diubah
                let newStok = parseFloat(this.value);

                // Lakukan validasi atau operasi lain jika diperlukan

                // Simpan data yang diperbarui ke database (contoh)
                // Anda dapat menggunakan AJAX atau metode lain untuk melakukan ini
                console.log('New Stok:', newStok);
                // Implementasikan penyimpanan data ke database di sini

                // Perbarui tampilan dengan nilai yang diperbarui
                this.parentNode.innerHTML = newStok;
            }
        });
    });
    document.getElementById('harga_beli').addEventListener('input', function() {
    let hargaBeli = parseFloat(this.value);

    // Menghitung harga jual dengan menambahkan keuntungan 70%
    let hargaJual = hargaBeli * 1.5;

    // Melakukan pembulatan ke atas menjadi kelipatan 500
    hargaJual = Math.ceil(hargaJual / 500) * 500;

    // Memasukkan harga jual ke dalam input harga_jual
    document.getElementById('harga_jual').value = hargaJual.toFixed(2);
});

</script>

@endpush