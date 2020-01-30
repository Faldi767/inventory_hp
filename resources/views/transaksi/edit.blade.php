@extends('master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Konfirmasi Pengiriman</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/transaksi/update/{{ $transaksi->id }}" id="tambah" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="bukti">Masukkan Bukti Pengiriman</label>
                        <input type="file" class="form-control" id="bukti" name="bukti" placeholder="Enter bukti">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" onclick="submitform()" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
  @if ($errors->any())
    Toast.fire({
        type: 'error',
        title: 'Data gagal dimasukkan.'
    }) 
  @endif

  @if ($message = Session::get('error'))
    Toast.fire({
        type: 'error',
        title: '{{ $message }}'
    }) 
  @endif
  function submitform() 
  {
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
        document.getElementById("tambah").submit();
      }
    })
  }
</script>
@endsection