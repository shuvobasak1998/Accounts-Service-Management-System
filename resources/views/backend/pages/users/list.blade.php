@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
@endsection
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0">User Information List</h4>
    <a href="{{ route('user.create') }}" class="btn btn-success">Create New</a>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                  <th>Profile Picture</th>
                  <th>Name</th>
                  <th>Email address</th>
                  <th>Phone number</th>
                  <th>User Role</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list as $user_data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $user_data->profile_photo_path) }}" alt="Inverse Logo" style="height: 100px; width: 120px;">
                    </td>
                    <td>{{ $user_data->first_name . ' ' . $user_data->last_name }}</td>
                    <td>{{ $user_data->email }}</td>
                    <td>{{ $user_data->mobile }}</td>
                    <td>{{ $user_data->UserRole->name }}</td>

                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('user.edit', $user_data->id) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('user.delete', $user_data->id) }}" class="btn btn-outline-danger ml-1"
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
