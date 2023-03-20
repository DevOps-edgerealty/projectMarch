@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Agents</li>
            </ol>
          </div>
          @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
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
                        <a href="{{url('admin/agents/create')}}" class="btn btn-block btn-warning border border-dark">
                            <i class="fas fa-plus-circle"></i>
                            Add New Agent
                        </a>

                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Order</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $data)
                        <tr>
                            <td class="text-center"> {{$data->id}} </td>
                            <td class="text-center"> {{$data->name_en}} </td>
                            <td class="text-center"> {{$data->phone}} </td>
                            <td class="text-center"> {{$data->email}} </td>
                            <td class="text-center"> {{$data->agent_order}} </td>

                            <td class="text-center">
                                @if ($data->status == 1 )
                                <i class="fas fa-check-circle" style="color: #72d672;"></i>

                                @else
                                <i class="fas fa-times-circle" style="color: red;"></i>

                                @endif
                            </td>

                            <td class="mx-auto text-center">
                                {{-- <a href="" class="btn btn-sm btn-primary" ><small>View</small>  </a> --}}
                                <a href="{{url('admin/agents/edit').'/'. $data->id }}" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i> Edit </a> &nbsp; &nbsp;
                                {{-- <a href="{{url('admin/agents/destroy').'/'. $data->id }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a> &nbsp; &nbsp; --}}
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i> Delete</button>&nbsp; &nbsp;
                                <a href="{{url('admin/agents/properties').'/'. $data->id }}" class="btn btn-sm btn-outline-primary" ><i class="fas fa-eye"></i> Properties</a>
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

            <div class="modal fade" id="modal-default" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this agent?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="{{url('admin/agents/destroy').'/'. $data->id }}" class="btn btn-sm btn-outline-danger" >
                                <i class="fas fa-trash-alt"></i>
                                Delete
                            </a>
                        </div>
                    </div>

                </div>

                </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection
