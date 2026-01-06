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
</style>
{{-- @dd($team_infos); --}}
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0">Team Member Information List</h4>
    <a href="{{ route('our_team.create') }}" class="btn btn-success">Create New</a>
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
                  <th>Team Information Top Discription</th>
                  <th>Member Name</th>
                  <th>Member Designation</th>
                  <th>Team Member Image</th>
                  <th>Google Address</th>
                  <th>Facebook Address</th>
                  <th>Twitter Address</th>
                  <th>Linkedin Address</th>
                  <th>Pinterest Address</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($team_infos as $team_info)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $team_info->team_information_top_discription }}</td>
                    <td>{{ $team_info->team_member_name }}</td>
                    <td>{{ $team_info->team_member_designation }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $team_info->team_member_image_path) }}" alt="Inverse Logo" style="height: 100px; width: 120px;">
                    </td>
                    <td>{{ $team_info->google_address }}</td>
                    <td>{{ $team_info->facebook_address }}</td>
                    <td>{{ $team_info->twitter_address }}</td>
                    <td>{{ $team_info->linkedin_address }}</td>
                    <td>{{ $team_info->pinterest_address }}</td>
                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('our_team.edit', $team_info->id) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('our_team.delete', $team_info->id) }}" class="btn btn-outline-danger ml-1"
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
