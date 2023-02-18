@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Properties</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/agents/show')}}">Agents</a></li>
                        <li class="breadcrumb-item active">Properties</li>
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
                            <div class="card-body">
                                <form method="POST" action="{{url('admin/agents/properties/add-listing')}}" enctype="multipart/form-data">
                                        @csrf
                                        @honeypot
                                    <div class="row">

                                        <div class="col-1">
                                            <label>Add Property</label>
                                        </div>
                                        <input type="text" value="{{ $result2->id }}" name="agent_id" hidden />
                                        <div class="col-7">
                                            <select class="form-control" name="property_id">
                                                <option class="bg-dark"  value=""> &nbsp; REFERENCE NUMBER &nbsp; : &nbsp; ID &nbsp; :  &nbsp; PROPERTY TITLE</option>

                                                @foreach($result3 as $data)
                                                    <option value="{{ $data->id }}">{{ $data->ref_no }} &nbsp; : &nbsp; {{ $data->id }} &nbsp; : &nbsp; {{ $data->title_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-warning btn-block" type="submit">
                                                <i class="fas fa-plus-circle"></i>
                                                Add Property
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Properties of {{ $result2->name_en }}</h3>

                                <div class="card-tools">



                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($result as $data)
                                        <tr>
                                            <td class="text-center"> {{$data->id}} </td>
                                            <td class="text-center"> {{$data->title_en}} </td>
                                            <td class="text-center">
                                                @if ($data->type_id == 1 )
                                                    Sale
                                                @else
                                                    Rent
                                                @endif
                                            </td>
                                            <td class="text-center"> {{$data->address_en}}   </td>

                                            <td class="text-center">
                                                @if ($data->status == 1 )
                                                <i class="fas fa-check-circle" style="color: #72d672;"></i>

                                                @else
                                                <i class="fas fa-times-circle" style="color: red;"></i>

                                                @endif
                                            </td>

                                            <td class="mx-auto text-center">
                                                <a href="{{url('admin/agents/properties/unlist').'/'. $data->id }}" class="btn btn-sm btn-outline-danger" ><i class="fas fa-trash-alt"></i> Remove</a> &nbsp; &nbsp;
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

    </div>





@endsection
