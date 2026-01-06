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
    <h4 class="mb-0">Services Information List</h4>
    <a href="{{ route('servicesinfo.create') }}" class="btn btn-success">Create New</a>
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
                  <th>Services Top Discription</th>
                  <th>Services Card Title</th>
                  <th>Services Card Subtitle</th>
                  <th>Services Card Discription</th>
                  <th>Services Card Image</th>
                  <th>Service Overview</th>
                  <th>Service Category</th>
                  <th>Services Attachment</th>
                  <th>Performance Discription</th>
                  <th>Build Quality(%)</th>
                  <th>Technology(%)</th>
                  <th>Sustainability(%)</th>
                  <th>Service Benefits</th>
                  <th>Title</th>
                  <th>Details Description</th>
                  <th class="fixed-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($serviceinfos as $serviceinfo)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{!! $serviceinfo->services_top_discription !!}</td>
                    <td>{{ $serviceinfo->services_card_title }}</td>
                    <td>{{ $serviceinfo->services_card_subtitle }}</td>
                    <td>{!! $serviceinfo->services_card_discription !!}</td>
                    <td style="text-align: center; vertical-align: middle;">
                      <img src="{{ asset('storage/' . $serviceinfo->services_card_image_path) }}" alt="Inverse Logo"
                        style="height: 100px; width: 120px;">
                    </td>
                    <td>{!! $serviceinfo->service_overview !!}</td>
                    <td>{{ $serviceinfo->SetviceCategory->name }}</td>
                    @if (isset($serviceinfo->service_attachment_path))
                      @php
                        // Get file extension for the current attachment
                        $fileExtension = pathinfo($serviceinfo->service_attachment_path, PATHINFO_EXTENSION);
                        // Define a mapping of extensions to icons (Font Awesome)
                        $fileIcons = [
                            'pdf' => 'fas fa-file-pdf',
                            'doc' => 'fas fa-file-word',
                            'docx' => 'fas fa-file-word',
                            'xls' => 'fas fa-file-excel',
                            'xlsx' => 'fas fa-file-excel',
                            'jpg' => 'fas fa-file-image',
                            'jpeg' => 'fas fa-file-image',
                            'png' => 'fas fa-file-image',
                            'txt' => 'fas fa-file-alt',
                        ];
                        $iconClass = $fileIcons[$fileExtension] ?? 'fas fa-file'; // Default icon if not found
                      @endphp
                    @endif
                    <td>
                      @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <a class="image-popup-no-margins" href="{{ asset('storage/' . $serviceinfo->service_attachment_path) }}">
                          <img class="img-fluid" alt="" src="{{ asset('storage/' . $serviceinfo->service_attachment_path) }}" width="50">
                        </a>
                      @else
                        <a href="{{ asset('storage/' . $serviceinfo->service_attachment_path) }}" class="print_button" target="_blank">
                          <i class="{{ $iconClass }} fa-3x"></i>
                        </a>
                      @endif
                    </td>
                    <td>{!! $serviceinfo->performance_discription !!}</td>
                    @php
                      $performance = json_decode($serviceinfo->performance, true);
                    @endphp
                    <td>{{ $performance['build_quality'] }}</td>
                    <td>{{ $performance['technology'] }}</td>ServiceBenefits
                    <td>{{ $performance['sustainability'] }}</td>
                    <td>
                      @foreach ($serviceinfo->ServiceBenefits as $ServiceBenefit)
                        {{ $loop->iteration . '.' . $ServiceBenefit->service_benefit }}</br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($serviceinfo->ServiceAskQuestion as $AskQuestion)
                        {{ $loop->iteration . '.' . $AskQuestion->details_title }}</br>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($serviceinfo->ServiceAskQuestion as $AskQuestion)
                        {{ $loop->iteration . '.' . $AskQuestion->detail_discription }}</br>
                      @endforeach
                    </td>

                    <td class="fixed-right">
                      <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('servicesinfo.edit', $serviceinfo->id) }}" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('servicesinfo.delete', $serviceinfo->id) }}" class="btn btn-outline-danger ml-1"
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
