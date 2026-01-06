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
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0">Blog Category List</h4>
    <a href="{{ route('blog_category.create') }}" class="btn btn-success">Create New</a>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  {{-- @dd($serviceinfos); --}}
  <div class="form-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table id="myTable" class="table table-bordered text-wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Title</th>
                  <th>Slag</th>
                  <th>Tag</th>
                  <th>Status</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($BlogCatrgoryinfos as $BlogCatrgoryinfo)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $BlogCatrgoryinfo->name }}</td>
                    <td class="text-center">{{ $BlogCatrgoryinfo->slug }}</td>
                    <td>
                      @foreach ($BlogCatrgoryinfo->blogCategoryTagInfo as $tagInfo)
                        {{ $loop->iteration . '.' . $tagInfo->tag->name }}</br>
                      @endforeach
                    </td>
                    <td class="text-center">
                      {!! $BlogCatrgoryinfo->status == 1
                          ? '<div class="badge rounded-pill bg-success text-white float p-2 fs-6">Active</div>'
                          : '<div class="badge rounded-pill bg-warning text-white float p-2 fs-6">Inactive</div>' !!}
                    </td>
                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('blog_category.edit', $BlogCatrgoryinfo->id) }}" class="btn btn-outline-info"><i
                            class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('blog_category.delete', $BlogCatrgoryinfo->id) }}" class="btn btn-outline-danger ml-1"
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
