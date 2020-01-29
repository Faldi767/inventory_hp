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
                <h3 class="card-title">Edit Smartphone</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/smartphone/update/{{ $smartphone->id }}" id="edit">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="card-body">
                    <div class="form-group">
                        <label for="nama_smartphone">Nama Smartphone</label>
                        <input type="text" class="form-control" id="nama_smartphone" name="nama_smartphone" placeholder="Enter smartphone name" value="{{ $smartphone->nama_smartphone}}">
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id" id="brand_id">
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
    document.getElementById('brand_id').value = "{{ $smartphone->brand_id }}";
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    @if ($errors->any())
        Toast.fire({
            type: 'error',
            title: 'Data gagal di update.'
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
            document.getElementById("edit").submit();
        }
        })
    }
</script>
@endsection