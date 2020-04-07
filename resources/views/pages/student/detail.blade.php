@extends('layouts.common')

@section('page-header')
<link href="{{ asset('css/my-style.css') }}" rel="stylesheet">
@endsection

@section('page-title')
Education Detail
@endsection

@section('content')
<!-- Row -->
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-xlg-3 col-md-5">
    <div class="card"> <img class="card-img" src="/images/detail-img.jpg" height="456" alt="Card image">
      <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
        <div class="align-self-center"> <img src="{{ $data->avatar }}" class="img-circle" width="100">
          <h4 class="card-title">{{ $data->name }}</h4>
          <h6 class="card-subtitle">{{ current(explode(' ', $data->registered_date)) }} registered</h6>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <!-- .row -->
        <div class="row text-center m-t-10">
          <div class="col-md-6 border-right"><strong>Gender</strong>
            <p>{{ $data->gender==0? 'Male': 'Female' }}</p>
          </div>
          <div class="col-md-6"><strong>Age</strong>
            <p>{{ $data->age }}</p>
          </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- .row -->
        <div class="row text-center m-t-10">
          <div class="col-md-6 border-right"><strong>Email</strong>
            <p>{{ $data->email }}</p>
          </div>
          <div class="col-md-6"><strong>Phone</strong>
            <p>{{ $data->phone }}</p>
          </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- .row -->
        <div class="row text-center m-t-10">
          <div class="col-md-12"><strong>Location</strong>
            <p>{{ $data->location }}</p>
          </div>
        </div>
        <!-- /.row -->
        <hr>
      </div>
    </div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs profile-tab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
        <div class="pt-2 px-5 flex-xl-grow-1">
          <a href="/student" class="btn waves-effect waves-light btn-rounded btn-outline-info m-1 float-right">Back</a>
        </div>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="profile" role="tabpanel">
          <div class="card-body">
            <form class="form-horizontal form-material">
              <div class="form-group">
                <label class="col-md-12">Grade that can teach</label>
                <div class="col-md-12">
                  <input type="text" class="form-control form-control-line p-l-10" value="{{ $data->grade }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">School Subject</label>
                <div class="col-md-12">
                  <input type="text" class="form-control form-control-line" value="{{ $data->subject }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Extra Activity</label>
                <div class="col-md-12">
                  <input type="text" class="form-control form-control-line" value="{{ $data->activity }}" disabled>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="col-md-12">Lesson per Week</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control form-control-line" value="{{ $data->lesson_week }}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="col-md-12">Private/Group</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control form-control-line" value="{{ $data->private_group }}" disabled>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Column -->
</div>
<!-- Row -->
@endsection

@section('page-footer')
<!-- DataTable -->
@endsection