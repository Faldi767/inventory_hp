@extends('../master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Toko</th>
                  <th>Nama Smartphone</th>
                  <th>Jumlah</th>
                  <th>Bukti</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $t)
                  <tr>
                        <td>{{ $t->toko->nama_toko }}</td>
                        <td>{{ $t->smartphone->brand->nama_brand }} {{ $t->smartphone->nama_smartphone }}</td>
                        <td>{{ $t->jumlah }}</td>
                        <td>@if($t->bukti != NULL)<button type="button" class="btn btn-primary" onclick="showbukti('{{ $t->bukti }}')">Klik Disini</button>@endif</td>
                        <td>
                            @if($t->status == 0)
                                Sedang Diproses
                            @elseif($t->status == 1)
                                Pesanan Selesai
                            @endif
                        </td>
                        <td>
                        @if(Session::get('nama_toko') == "Erafone Pusat" && $t->status == 0)
                          <a href="transaksi/edit/{{ $t->id }}" class="btn btn-primary">Konfirmasi Permintaan</a>
                          <button type="button" onclick="deleteConfirm({{ $t->id }})" class="btn btn-danger">Cancel</button>
                        @endif
                        </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Nama Smartphone</th>
                    <th>Brand</th>
                    <th>Jumlah</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection

@section('pagescript')
<!-- page script -->
<script type="text/javascript">
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
  });
  @if ($message = Session::get('success'))
  Toast.fire({
      type: 'success',
      title: '{{ $message }}'
  })
  @endif
  function deleteConfirm(id) 
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "Order will be cancelled.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      showLoaderOnConfirm: true
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Processing',
          html: 'Please Wait',
          timer: 1000,
          timerProgressBar: true,
          allowOutsideClick: false,
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              const content = Swal.getContent()
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "transaksi/hapus/" + id;
          }
        })
      }
    })
  }

  function showbukti($id) {
    imagelink = '{{ asset("buktitransaksi") }}/' + $id;
    Swal.fire({
        showCancelButton: false,
        showConfirmButton: false,
        imageUrl: imagelink,
    })
  }
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection