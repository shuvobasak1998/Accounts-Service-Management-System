@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
@endsection
<style>
  .btn {
    padding: 10px !important;
  }

  .form-box .card {
    border-radius: 12px;
    box-shadow: none;
    padding: 20px;
  }

  .fixed-right {
    background-color: #f1f1f1;
    position: sticky !important;
    right: -30 !important;
    z-index: 1 !important;
  }
</style>
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0">Partners Information List</h4>
    <a href="{{ route('partnersinfo.create') }}" class="btn btn-success">Create New</a>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  {{-- @dd($partnersinfos); --}}
  <div class="form-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table id="myTable" class="table table-bordered text-wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Partners Top Discription</th>
                  <th>Card Title</th>
                  <th>Card Subtitle</th>
                  <th>Card Image</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($partnersinfos as $partnersinfo)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{!! $partnersinfo->partners_top_discription !!}</td>
                    <td>{{ $partnersinfo->card_title }}</td>
                    <td>{{ $partnersinfo->card_subtitle }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $partnersinfo->card_image_path) }}" alt="Inverse Logo"
                        style="height: 100px; width: 120px;">
                    </td>
                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('partnersinfo.edit', $partnersinfo->id) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('partnersinfo.delete', $partnersinfo->id) }}" class="btn btn-outline-danger ml-1"
                          onclick="return confirm('Are you sure you want to delete this Information..?');"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
@endsection
