@extends('layouts.common')

@section('page-header')
<style>
  div.card-body {
    min-height: 850px;
  }
</style>
@endsection

@section('page-title')
Activity Mangement
@endsection

@section('content')
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-body p-md-5">
        <div class="col-md-12 row">
          <div class="col-md-8">
            <h3 class="card-title">Title</h3>
          </div>
          <div class="col-md-4">
            <button class="btn btn-rounded btn-outline-info float-right" id="btn-add-title" data-toggle="modal" data-target="#modal1">Add</button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="act-title-table" class="table table-bordered table-striped">
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
  <div class="col-6">
    <div class="card">
      <div class="card-body p-md-5">
        <div class="col-md-12 row">
          <div class="col-md-4">
            <h3 class="card-title">Content</h3>
          </div>
          <div class="col-md-6">
            <select class="form-control" id="select-act-title">
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-rounded btn-outline-info float-right" id="btn-add-content" data-toggle="modal" data-target="#modal2">Add</button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="act-content-table" class="table table-bordered table-striped">
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

{{-- Add Modal1 --}}
<div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form class="form-title" action="javascript:;">
        <div class="modal-body p-t-40">
          <div class="form-group row">
            <input type="hidden" id="edit-title-id" value="0">
            <label for="title-text" class="col-sm-2 text-right control-label col-form-label">Title:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title-text" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light btn-title">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Add Modal2 --}}
<div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Content</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form class="form-content" action="javascript:;">
        <div class="modal-body p-t-20">
          <div class="form-group">
            <input type="hidden" id="edit-content-id" value="0">
            <div class="col-md-12 row">
              <label class="col-sm-3 text-right control-label col-form-label">Title :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control bg-white" id="selected-title-text" val="" readonly>
              </div>
            </div>
            <div class="col-md-12 m-t-20 row">
              <label for="content-text" class="col-sm-3 text-right control-label col-form-label">Content :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="content-text" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light btn-content">Add</button>
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
<script src="/js/activity-title-manage.js"></script>
<script src="/js/activity-content-manage.js"></script>
@endsection