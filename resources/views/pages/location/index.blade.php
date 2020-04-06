@extends('layouts.common')

@section('page-header')
<link href="/css/system/dataTables.bootstrap4.css" rel="stylesheet">
<!--alerts CSS -->
<link href="/css/system/sweetalert.css" rel="stylesheet" type="text/css">
<style>
  div.card-body {
    min-height: 850px;
  }
</style>
@endsection

@section('page-title')
Location Mangement
@endsection

@section('content')
<div class="col-md-12">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body p-md-5">
        <div class="col-md-12 row">
          <div class="col-md-8">
            <h3 class="card-title">Location</h3>
          </div>
          <div class="col-md-4">
            <button class="btn btn-rounded btn-outline-info float-right" id="btn-add" data-toggle="modal" data-target="#location-modal">Add</button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="location-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th width="10%">Action</th>
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

{{-- Add Location Modal --}}
<div id="location-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Location</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form class="form-location" action="javascript:;">
        <div class="modal-body p-t-40">
          <div class="form-group row">
            <input type="hidden" id="edit-id" value="0">
            <label for="location-text" class="col-sm-2 text-right control-label col-form-label">Location:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="location-text" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light btn-location">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('page-footer')
<script>
  let _token = "{{ csrf_token() }}";
</script>
<!-- DataTable -->
<script src="/js/system/datatables.min.js"></script>
<!-- Sweet-Alert  -->
<script src="/js/system/sweetalert.min.js"></script>

<script src="/js/location-manage.js"></script>
@endsection