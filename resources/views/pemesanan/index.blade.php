@extends('template.layout')

@push('style')
    
@endpush

@section('content')
<section class="content">
    <div class="card">
        <div class="row"> <!-- Menggunakan row untuk membagi layout menjadi 2 kolom -->
            <div class="col-md-2"> <!-- Kolom untuk sidebar dengan daftar menu -->
                <div class="container">
                    <div class="item-sidebar">
                        <ul>
                            @foreach($jenis as $j)
                                <li>
                                    <h3>{{ $j->nama_jenis }}</h3>
                                    <ul class="menu-item">
                                        @foreach($j->menu as $menu)
                                            <button data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">{{ $menu->nama_menu }}</button>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3"> <!-- Kolom untuk konten pesanan dan footer -->
                <div class="item content">
                    <h3>Order</h3>
                    <ul class="ordered-list">
                        <!-- Daftar pesanan akan ditampilkan di sini -->
                    </ul>
                    Total Bayar : <h2 id="total">0</h2>
                    <button class="btn-bayar">Bayar</button> <!-- Tombol untuk melakukan pembayaran -->
                </div>
                <div class="item footer">footer</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
$(function(){
    const orderedList = [];
    
    const sum = () => {
        return orderedList.reduce((accumulator, object) => {
            return accumulator + (object.harga * object.qty);
        }, 0);
    };
    
    const changeQty = (el, inc) => {
        const id = $(el).closest('li').data('id');
        const index = orderedList.findIndex(list => list.menu_id === id);
        if (inc === -1 && orderedList[index].qty === 1) {
            return; // Kuantitas tidak bisa kurang dari 1
        }
        orderedList[index].qty += inc;
    
        const txt_subtotal = $(el).closest('li').find('.subtotal');
        const txt_qty = $(el).closest('li').find('.qty-item');
        txt_qty.val(parseInt(txt_qty.val()) + inc);
        txt_subtotal.text(orderedList[index].harga * orderedList[index].qty);
    
        $('#total').html(sum());
    };
    
    $(".menu-item button").click(function(){
        const menu_clicked = $(this).text();
        const data = $(this).data();
        const harga = parseFloat(data.harga);
        const id = parseInt(data.id);
    
        let found = false;
        orderedList.forEach((item, index) => {
            if(item.menu_id === id) {
                orderedList[index].qty++;
                $(`.qty-item[data-id="${id}"]`).val(orderedList[index].qty);
                $(`.subtotal[data-id="${id}"]`).text(orderedList[index].harga * orderedList[index].qty);
                found = true;
            }
        });
    
        if(!found) {
            let dataN = {'menu_id' : id, 'menu' : menu_clicked, 'harga' : harga, 'qty':1};
            orderedList.push(dataN);
            let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`;
            listOrder += `Sub Total : Rp. ${harga}`;
            listOrder += `<button class='remove-item'>hapus</button>
                          <button class="btn-dec"> - </button>
                          <input class="qty-item"
                                 type="number"
                                 value="1"
                                 style="width:30px"
                                 readonly
                          />
                          <button class="btn-inc">+</button>
                          <h2><span class="subtotal" data-id="${id}">${harga * 1}</span></h2>
                          </li>`;
            $('.ordered-list').append(listOrder);
        }
    
        $('#total').html(sum());
    });
    
    // Event listener untuk tombol hapus item
    $(document).on('click', '.remove-item', function() {
        const id = $(this).closest('li').data('id');
        const index = orderedList.findIndex(list => list.menu_id === id);
        orderedList.splice(index, 1); // Hapus item dari orderedList
        $(this).closest('li').remove(); // Hapus elemen dari DOM
        $('#total').html(sum()); // Hitung total kembali setelah item dihapus
    });
    
    $('.btn-bayar').on('click', function() { // Menggunakan class selector untuk tombol bayar
        $.ajax({
            url: "{{ route('transaksi.store') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                orderedList: orderedList,
                total: sum() // Menggunakan fungsi sum() untuk mendapatkan total
            },
            success: function(data) {
                console.log(data);
                Swal.fire({
                    title: data.message,
                    showDenyButton: true,
                    confirmButtonText: "cetak nota",
                    denyButtonText: `ok`
                }).then((result) => {
                    if(result.isConfirmed) {
                        window.open("{{ url('nota') }}/|"+data.notrans)
                    } else if (result.isDenied) {
                        location.reload()
                    }
                });
            }
        });
    });
    
    // Event listener for increment button
    $(document).on('click', '.btn-inc', function() {
        changeQty(this, 1);
    });
    
    // Event listener for decrement button
    $(document).on('click', '.btn-dec', function() {
        changeQty(this, -1);
    });
});

</script>
@endpush
