@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row my-3">
          <div class="col-sm-6">
            <h1>Luxury Project Locations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Location</li>
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
                @if(session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Detail</h3>

                  {{-- <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="{{url('admin/properties/create')}}" class="btn btn-block btn-secondary"><i class="fas fa-plus-circle"></i> Create New</a>

                    </div>
                  </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Longitude</th>

                        <th>latitude</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td> {{$data->title_en}} </td>
                            <td>
                                {{@$data->project_locations->longitude}}
                            </td>
                            <td>
                                {{@$data->project_locations->latitude}}
                            </td>

                            <td>
                                <a href="{{url('admin/projects/location/make').'/'. $data->id }}" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i> Update </a>
                                <a href="{{url('admin/projects/location/delete').'/'. $data->id }}" class="btn btn-sm btn-danger" ><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>

                {{-- {!! $leads->appends($_GET)->links() !!} --}}
                {{-- {!! $properties->appends($_GET)->links() !!} --}}
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
