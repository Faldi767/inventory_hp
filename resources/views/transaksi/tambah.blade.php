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
                <h3 class="card-title">Request Pesanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/transaksi/store" id="tambah" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Toko</label>
                        <select class="form-control select2bs4" name="toko_id">
                            @foreach($toko as $t)
                                <option value="{{ $t->id }}">{{ $t->nama_toko }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Smartphone</label>
                        <select class="form-control select2bs4" name="smartphone_id">
                            @foreach($smartphone as $sm)
                                @if($sm->jumlah != 0)
                                <option value="{{ $sm->id }}">{{ $sm->nama_smartphone }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah">
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
    $(function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: "Pilih",
            allowClear: true
        })
    });
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