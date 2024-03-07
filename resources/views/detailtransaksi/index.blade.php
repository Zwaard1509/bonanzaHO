@extends('template.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">detailtransaksi</h3>

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
            
        </div>
        <div class="mb-2">
            @include('detailtransaksi.data')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>

    </div>
    </div>
    <!-- /.card -->

</section>
@endsection

@push('script')
<script>
    $('#modalFormdetailtransaksi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget);
        console.log(btn.data('mode'));
        const mode = btn.data('mode');
        const nama_detailtransaksi = btn.data('nama_detailtransaksi');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data detailtransaksi');
            modal.find('#Nama').val(nama_detailtransaksi); // Assuming your input field has the id "Nama"
            modal.find('.modal-body form').attr('action', '{{ url("detailtransaksi") }}/' + id);
            modal.find('#method').html('@method("PUT")');
        } else {
            modal.find('.modal-title').text('Input Data detailtransaksi');
            modal.find('#Nama').val(''); // Clear the input field for new entries
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("detailtransaksi") }}');
        }
    });
</script>

@endpush