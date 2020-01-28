@extends('master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/role/store">
              {{ csrf_field() }}
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Error</h5>
                            @if ($errors->has('nama_role'))
                                {{ $errors->first('nama_role') }}
                            @endif
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nama_role">Nama Role</label>
                        <input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Enter role name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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