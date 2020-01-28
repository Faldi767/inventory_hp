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
                <h3 class="card-title">Edit Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/client/update/{{ $client->id }}" id="edit">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="card-body">
                    <div class="form-group">
                        <label for="user_nama">Nama Client</label>
                        <input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="Enter client name" value="{{ $client->user_nama}}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{ $client->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ $client->password }}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach($role as $r)
                                <option value="{{ $r->id }}">{{ $r->nama_role }}</option>
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
    document.getElementById('role_id').value = "{{ $client->role_id }}";
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