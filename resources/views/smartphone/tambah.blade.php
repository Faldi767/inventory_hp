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
                <h3 class="card-title">Tambah Smartphone</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/smartphone/store" id="tambah">
              {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_smartphone">Nama Smartphone</label>
                        <input type="text" class="form-control" id="nama_smartphone" name="nama_smartphone" placeholder="Enter smartphone name">
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control select2bs4" name="brand_id">
                            @foreach($brand as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_brand }}</option>
                            @endforeach
                        </select>
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