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
    <div class="card"> <img class="card-img" src="../assets/images/background/socialbg.jpg" height="456" alt="Card image">
      <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
        <div class="align-self-center"> <img src="{{ $data->avatar }}" class="img-circle" width="100">
          <h4 class="card-title">{{ $data->name }}</h4>
          <h6 class="card-subtitle">{{ current(explode(' ', $data->registered_date)) }} registered</h6>
          @if ($data->membership_type!=0)
          <h6 class="card-subtitle">Premium Member since {{ current(explode(' ', $data->membership_updated_date)) }}</h6>
          @else
          <h6 class="card-subtitle">Free Member</h6>
          @endif
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <!-- .row -->
        <div class="row text-center m-t-10">
          <div class="col-md-6 border-right"><strong>Email ID</strong>
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
          <div class="col-md-12"><strong>Address</strong>
            <p>{{ $data->address }}</p>
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
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
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
              <div class="form-group">
                <label class="col-md-12">Description</label>
                <div class="col-md-12 m-t-10">
                  <textarea rows="4" class="form-control" disabled>{{ $data->description }}</textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane" id="home" role="tabpanel">
          <div class="card-body">
            <div class="profiletimeline">
              <div class="calendar-head">
                <div class="calendar-head-cell-blank"></div>
                <div class="calendar-head-cell">Mon</div>
                <div class="calendar-head-cell">Tue</div>
                <div class="calendar-head-cell">Wed</div>
                <div class="calendar-head-cell">Thu</div>
                <div class="calendar-head-cell">Fri</div>
                <div class="calendar-head-cell">Sat</div>
                <div class="calendar-head-cell">Sun</div>
              </div>
              <div class="calendar-body">
                <div class="calendar-time">
                  <?php
                  for ($i = 8; $i < 23; $i++) {
                  ?>
                    <div class="caldendar-time-cell subhead"><?= $i < 10 ? '0' . $i . ':00' : $i . ':00'; ?></div>
                  <?php
                  }
                  ?>
                </div>
                <?php
                $timeline = explode(',', $data->timeline);
                for ($i = 1; $i < 8; $i++) {
                ?>
                  <div class="calendar-week-day">
                    <?php
                    for ($j = 8; $j < 23; $j++) {
                      $time = 'cell-' . $i . '-' . $j;
                    ?>
                      <div class="caption calendar-cell-container">
                        <div class="calendar-cell <?= in_array($time, $timeline) ? 'calendar-cell-actived' : ''; ?>"></div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
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