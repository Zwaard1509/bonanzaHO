@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">stok</h3>

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


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormstok" style="margin-top: 2px;">
                Tambah stok!
            </button>
            
        </div>
        <div class="mb-2">
            @include('stok.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
    @include('stok.form')
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
        $('#tbl-stok').DataTable(); // Corrected the DataTable initialization
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

    $('#modalFormstok').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget);
        console.log(btn.data('mode'));
        const mode = btn.data('mode');
        const nama_stok = btn.data('nama_stok');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data stok');
            modal.find('#Nama').val(nama_stok); // Assuming your input field has the id "Nama"
            modal.find('.modal-body form').attr('action', '{{ url("stok") }}/' + id);
            modal.find('#method').html('@method("PUT")');
        } else {
            modal.find('.modal-title').text('Input Data stok');
            modal.find('#Nama').val(''); // Clear the input field for new entries
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("stok") }}');
        }
    });
</script>

@endpush