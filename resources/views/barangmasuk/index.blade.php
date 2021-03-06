@extends('../master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Barang Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="/barangmasuk/tambah" class="btn btn-primary">Tambah Barang</a>
                <br>
                <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Supplier</th>
                  <th>Nama Smartphone</th>
                  <th>Jumlah</th>
                  <th>Bukti</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barangmasuk as $b)
                  <tr>
                      <td>{{ $b->supplier->nama_supplier }}</td>
                      <td>{{ $b->smartphone->brand->nama_brand }} {{ $b->smartphone->nama_smartphone }}</td>
                      <td>{{ $b->jumlah }}</td>
                      <td><button type="button" class="btn btn-primary" onclick="showbukti('{{ $b->bukti }}')">Klik Disini</button></td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Nama Smartphone</th>
                    <th>Brand</th>
                    <th>Jumlah</th>
                    <th>Bukti</th>
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
      text: "You still able to restore data from trash.",
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
            window.location.href = "smartphone/hapus/" + id;
          }
        })
      }
    })
  }

  function showbukti($id) {
    imagelink = '{{ asset("buktibarangmasuk") }}/' + $id;
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