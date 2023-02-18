@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">General Setting</li>
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
                        <a href="{{url('admin/generalsetting/edit/')}}" class="btn btn-block btn-secondary"><i class="fas fa-edit"></i> Edit</a>

                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table ">
                    <thead>

                    </thead>
                    <tbody>
                        @foreach ($generalsetting as $item)


                        <tr>
                            <td>Site Title:</td>
                            <td>{{$item->site_title}}</td>
                        </tr>
                        <tr>
                            <td>Home Page Text:</td>
                            <td>{{$item->Home_page_text}}</td>
                        </tr>
                        <tr>
                            <td>Email Contact form:</td>
                            <td>{{$item->Email_Contact_form}}</td>
                        </tr>
                        <tr>
                            <td>Whatsapp Contact:</td>
                            <td>{{$item->whatsapp_contact}}</td>
                        </tr>
                        <tr>
                            <td>Phone No:</td>
                            <td>{{$item->phone_no}}</td>
                        </tr>
                        <tr>
                            <td>Click to Call No:</td>
                            <td>{{$item->click_to_call}}</td>
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
