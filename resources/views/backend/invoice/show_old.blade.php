@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invioces</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Invioces</li>
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
                    @if(session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                @endif
                  <h3 class="card-title">Detail</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <a href="{{url('admin/invoice/create')}}" class="btn btn-block btn-secondary"><i class="fas fa-plus-circle"></i> Create New</a>

                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Title</th>
                                <th>Invoice No</th>
                                <th>Contract No</th>
                                <th class="text-center" style="width:200px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($invoice as $invoices)
                            <tr>
                                <td>
                                    {!! $invoices->id !!}
                                </td>
                                <td>
                                    {!! $invoices->Name !!}
                                </td>
                                <td>
                                    {!! $invoices->invoice_no !!}
                                </td>
                                <td>
                                    {!! $invoices->contract_no !!}
                                </td>
                                <td>
                                    {{-- <a href="" class="btn btn-sm btn-primary" ><small>View</small>  </a> --}}
                                    <a href="{{url('admin/invoice/edit').'/'. $invoices->id }}" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i> Edit </a>
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




