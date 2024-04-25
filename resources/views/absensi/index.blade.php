@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">absensi</h3>

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


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormabsensi" style="margin-top: 2px;">
                Tambah absensi!
            </button>
            <a href="{{ route('export-absensi') }}" class="btn btn-primary" style="margin-top: 2px;">
                 <i class="fa fa-file-excel"></i> Export Masseh
            </a>
    
        </div>
        <div class="mb-5">
            @include('absensi.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
<!-- /.card -->
@include('absensi.form')

</section>
@endsection

@push('script')
<script>
    $(function() {
        $('#tbl-absensi').DataTable({
            "responsive": true, // Enable responsive mode
            "autoWidth": false // Disable auto width calculation
        });
    });

    $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500);
    });

    $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
        $('#error-alert').slideUp(500);
    });

    // dialog hapus Data
    $('.btn-delete').on('click', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
        });
    });

    $('#modalFormabsensi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget);
        console.log(btn.data('mode'));
        const mode = btn.data('mode');
        const nama_absensi = btn.data('namaKaryawan');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data absensi');
            modal.find('#Nama').val(nama_absensi); // Assuming your input field has the id "Nama"
            modal.find('.modal-content form').attr('action', '{{ url("absensi") }}/' + id);
            modal.find('#method').html('@method('PUT')');
        } else {
            modal.find('.modal-title').text('Input Data absensi');
            modal.find('#Nama').val(''); // Clear the input field for new entries
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("absensi") }}');
        }
    });
</script>

<!-- </div> tutup div utama -->


@endpush