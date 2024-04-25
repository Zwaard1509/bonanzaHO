@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">jenis</h3>

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


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormjenis" style="margin-top: 2px;">
                Tambah jenis!
            </button>
            <a href="{{ route('export-jenis') }}" class="btn-btn success">
                <i class="fa fa-file-excel"></i>Export Masseh
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#JenisImport">
                <i class="fas fa-file-excel"></i>Import
            </button>
            
        </div>
        <div class="mb-2">
            @include('jenis.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    <!-- /.card-footer-->
    @include('jenis.form')
    </div>
    <!-- /.card -->

</section>
@endsection

@push('script')
<script>
    $('#modalFormjenis').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget);
        console.log(btn.data('mode'));
        const mode = btn.data('mode');
        const nama_jenis = btn.data('nama_jenis');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data jenis');
            modal.find('#Nama').val(nama_jenis); // Assuming your input field has the id "Nama"
            modal.find('.modal-body form').attr('action', '{{ url("jenis") }}/' + id);
            modal.find('#method').html('@method("PUT")');
        } else {
            modal.find('.modal-title').text('Input Data jenis');
            modal.find('#Nama').val(''); // Clear the input field for new entries
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("jenis") }}');
        }
    });
</script>

@endpush