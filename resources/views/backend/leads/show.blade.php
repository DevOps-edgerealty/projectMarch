@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leads</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
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
                  <h3 class="card-title">Lead Details</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" >
                        <p class="" style="font-size: 1.2rem;">
                            {{ $leadscount }} leads for the month of {{ Illuminate\Support\Carbon::now()->format('F Y') }}
                        </p>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap ">
                    <thead class="bg-black text-white w-100">
                      <tr>
                        <th>id</th>
                        <th>Lead Name</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Page Link</th>
                        <th>Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $data)
                        <tr>
                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{ $data->id }}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{$data->lead_name}}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{$data->full_name}}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{$data->phone}}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{$data->email}}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                {{-- {{$data->page_url}} --}}
                                    {{ Str::limit(substr(@$data->page_url, 25), 23) }}
                                </a>
                            </td>

                            <td>
                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-xl-{{ $data->id }}" class="text-dark">
                                    {{ date('D d M Y', strtotime($data->created_at)) }} -
                                    {{ date('h:m a', strtotime($data->created_at)) }}


                                </a>
                            </td>

                            {{-- <td>
                                <a href="{{url('admin/projects/edit').'/'. $data->id }}" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i> Edit </a>
                                <a href="" class="btn btn-sm btn-danger" ><i class="fas fa-trash-alt"></i> Delete</a>
                            </td> --}}
                        </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-dark">

                    {{-- {!! $data->links() !!} --}}
                    {!! $leads->appends($_GET)->links() !!}
                    {{ $leads->firstItem() }} - {{ $leads->lastItem() }} Total Leads {{$leads->total()}}
                </div>

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

    @foreach ($leads as $lead)
        <div class="modal fade bs-example-modal-xl-{{ $lead->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lead Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-rep-plugin mb-3">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Lead Name :</th>
                                                    <td>
                                                        @if ($lead->lead_name == '')
                                                            -
                                                        @else
                                                            {{$lead->lead_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Full Name :</th>
                                                    <td>{{$lead->full_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone :</th>
                                                    <td>{{@$lead->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email :</th>
                                                    <td>{{$lead->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bedrooms :</th>
                                                    <td>
                                                        @if($lead->bedrooms == '')
                                                            -
                                                        @else
                                                            {{$lead->bedrooms}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Lead Source</th>
                                                    <td>
                                                        <a href="{{$lead->page_url}}" class="text-primary text-decoration-line" target="_blank">
                                                            {{$lead->page_url}}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Created At :</th>
                                                    <td>
                                                        {{ date('D d M Y', strtotime($data->created_at)) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Time :</th>
                                                    <td>
                                                        {{ date('h:m a', strtotime($data->created_at)) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
@endsection
