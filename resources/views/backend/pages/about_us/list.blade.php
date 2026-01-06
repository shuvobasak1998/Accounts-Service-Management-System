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
    <h4 class="mb-0">About Us Information List</h4>
    <a href="{{ route('about_us.create') }}" class="btn btn-success">Create New</a>
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
                  <th>About us Top Discription</th>
                  <th>About us First Image</th>
                  <th>About us Second Image</th>
                  <th>Card Title</th>
                  <th>Card Description</th>
                  <th>Feature Title</th>
                  <th>Feature</th>
                  <th>Feature Description</th>
                  <th>Why Choose us Top Discription</th>
                  <th>Title & Percentage Value(%)</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($aboutUsinfos as $aboutUsinfo)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{!! $aboutUsinfo->about_us_top_discription !!}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $aboutUsinfo->about_us_first_image_path) }}" alt="Inverse Logo"
                        style="height: 100px; width: 120px;">
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $aboutUsinfo->about_us_second_image_path) }}" alt="Inverse Logo"
                        style="height: 100px; width: 120px;">
                    </td>
                    <td>
                      @foreach ($aboutUsinfo->AboutUsCardInfo as $card_info)
                        {{ $loop->iteration . '.' . $card_info->about_us_card_title }}
                      @endforeach

                    </td>
                    <td>
                      @foreach ($aboutUsinfo->AboutUsCardInfo as $card_info)
                        {{ $loop->iteration . '.' . $card_info->about_us_card_discription }}
                      @endforeach
                    </td>
                    <td>{{ $aboutUsinfo->about_us_feature_title }}</td>
                    <td>
                      @foreach ($aboutUsinfo->AboutUsFeatureInfo as $feature_info)
                        {{ $loop->iteration . '.' . $feature_info->about_us_feature }}
                      @endforeach
                    </td>
                    <td>{!! $aboutUsinfo->about_us_feature_description !!}</td>
                    <td>{!! $aboutUsinfo->why_choose_us_description !!}</td>
                    @php
                      $title = json_decode($aboutUsinfo->topic_title, true);
                      $percentage_value = json_decode($aboutUsinfo->percentage_value, true);
                    @endphp
                    <td>
                      {{ $title['first_title'] . ':' . $percentage_value['first_percentage_value'] }}</br>
                      {{ $title['second_title'] . ':' . $percentage_value['second_percentage_value'] }}</br>
                      {{ $title['third_title'] . ':' . $percentage_value['third_percentage_value'] }}</br>
                    </td>

                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('about_us.edit', $aboutUsinfo->id) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('about_us.delete', $aboutUsinfo->id) }}" class="btn btn-outline-danger ml-1"
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
