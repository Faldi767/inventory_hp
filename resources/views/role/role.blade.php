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
                <a href="/role/tambah" class="btn btn-primary">Tambah Data</a>
                <a href="/role/trash" class="btn btn-primary">Tong Sampah</a>
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
                          <a href="/role/edit/{{ $r->id }}" class="btn btn-warning">Edit</a>
                          <a href="/role/hapus/{{ $r->id }}" class="btn btn-danger">Hapus</a>
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