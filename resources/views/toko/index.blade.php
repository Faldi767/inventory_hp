@extends('../master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="/toko/tambah" class="btn btn-primary">Tambah Data</a>
                <a href="/toko/trash" class="btn btn-primary">Tong Sampah</a>
                <br>
                <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Toko</th>
                  <th>Daftar Client</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($toko as $t)
                  <tr>
                      <td style="text-align: center;vertical-align: middle;">{{ $t->nama_toko }}</td>
                      <td style="vertical-align: middle;">
                        @forelse($t->client as $c)
                            <li>{{ $c->user_nama }} ({{ $c->role->nama_role }})</li>
                          @empty
                             <a href="{{ url('/client/tambah') }}">Tambahkan Client</a>
                        @endforelse
                      </td>
                      <td>
                          <a href="/toko/edit/{{ $t->id }}" class="btn btn-warning">Edit</a>
                          <button onclick="deleteConfirm({{ $t->id }})" class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Toko</th>
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
      text: "You still able to restore data from trash.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
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
            window.location.href = "toko/hapus/" + id;
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
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection