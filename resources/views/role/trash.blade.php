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
                <a href="/role/hapusall" class="btn btn-danger">Hapus Semua</a>
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
                          <a href="/role/hapuspermanen/{{ $r->id }}" class="btn btn-danger">Hapus Permanen</a>
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