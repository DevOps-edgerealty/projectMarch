@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Amenities</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Amenities</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Detail</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="{{url('admin/aminites/create')}}" class="btn btn-block btn-secondary"><i class="fas fa-plus-circle"></i> Create New</a>

                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>

                        <th>Title</th>
                        <th>Status</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($aminities as $data)
                        <tr>
                            <td> {{$data->id}} </td>

                            <td> {{$data->amenity_name_en}} </td>
                            <td>
                                @if ($data->status == 1 )
                                <i class="fas fa-check-circle" style="color: #72d672;"></i>

                                @else
                                <i class="fas fa-times-circle" style="color: red;"></i>

                                @endif
                            </td>
                            <td>
                                {{-- <a href="" class="btn btn-sm btn-primary" ><small>View</small>  </a> --}}
                                <a href="{{url('admin/aminites/edit').'/'. $data->id }}" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i> Edit </a>
                                <a href="" class="btn btn-sm btn-danger" ><i class="fas fa-trash-alt"></i> Delete</a>

                            </td>

                        </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
