@extends('layouts.common')

@section('page-title')
Education Mangement
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive m-t-40">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="3%">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Grade that can teach</th>
                <th>School Subject</th>
                <th>Extra Activity</th>
                <th>Approved</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-footer')
<script src="/js/education-manage.js"></script>
@endsection