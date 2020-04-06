@extends('layouts.common')

@section('page-header')
<link href="/css/system/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('page-title')
Tutor Mangement
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
                <th width="5%">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Service Area</th>
                <th>Grade that can teach</th>
                <th>School Subject</th>
                <th>Extra Activity</th>
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
<!-- DataTable -->
<script src="/js/system/datatables.min.js"></script>

<script src="/js/tutor-manage.js"></script>
@endsection