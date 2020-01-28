@extends('../master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Role</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="/role" class="btn btn-primary">Data Role</a>
                <a href="/role/restoreall" class="btn btn-success">Restore All</a>
                <button type="button" onclick="hapusall()" class="btn btn-danger">Hapus Semua</button>
                <br>
                <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($role as $r)
                  <tr>
                      <td>{{ $r->nama_role }}</td>
                      <td>
                          <a href="/role/restore/{{ $r->id }}" class="btn btn-success">Restore</a>
                          <button type="button" onclick="deleteConfirm({{ $r->id }})" class="btn btn-danger">Hapus Permanen</button>
                      </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Role</th>
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
      text: "You will not able to restore data once permanently deleted.",
      icon: 'warning',
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
            window.location.href = "hapuspermanen/" + id;
          }
        })
      }
    })
  }
  function hapusall() 
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "You will not able to restore data once permanently deleted.",
      icon: 'warning',
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
            window.location.href = "hapusall/";
          }
        })
      }
    })
  }
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection