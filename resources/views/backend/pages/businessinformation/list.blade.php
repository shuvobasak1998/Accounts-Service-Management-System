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
{{-- @dd($businessinfos); --}}
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0">Business Information List</h4>
    <a href="{{ route('businessinfo.create') }}" class="btn btn-success">Create New</a>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif

  <div class="form-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table id="myTable" class="table table-bordered text-wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Logo</th>
                  <th>Title</th>
                  <th>Code</th>
                  <th>Address</th>
                  <th>Welcome message title</th>
                  <th>Welcome message Sub-title</th>
                  <th>Welcome message discription</th>
                  <th>Mobile</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Website</th>
                  <th>Facebook Address</th>
                  <th>Twitter Address</th>
                  <th>Linkedin Address</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($businessinfos as $businessinfo)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $businessinfo->business_logo_path) }}" alt="Inverse Logo" style="height: 100px; width: 120px;">
                    </td>
                    <td>{{ $businessinfo->title }}</td>
                    <td>{{ $businessinfo->short_code }}</td>
                    <td>{!! $businessinfo->address !!}</td>
                    <td>{{ $businessinfo->welcome_msg_title }}</td>
                    <td>{{ $businessinfo->welcome_msg_subtitle }}</td>
                    <td>{!! $businessinfo->welcome_msg_discription !!}</td>
                    <td>{{ $businessinfo->mobile }}</td>
                    <td>{{ $businessinfo->telephone }}</td>
                    <td>{{ $businessinfo->email }}</td>
                    <td>{{ $businessinfo->web_address }}</td>
                    <td>{{ $businessinfo->facebook_address }}</td>
                    <td>{{ $businessinfo->twitter_address }}</td>
                    <td>{{ $businessinfo->linkedin_address }}</td>
                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('businessinfo.edit', $businessinfo->id) }}" class="btn btn-outline-info"><i
                            class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('businessinfo.delete', $businessinfo->id) }}" class="btn btn-outline-danger ml-1"
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
