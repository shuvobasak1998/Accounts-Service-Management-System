<!-- start page title -->
<div class="row pb-4">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0">{{ $title }}</h4>
      {{ $AdditionalContent ?? '' }}
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          @if (isset($BrRoute))
            <li class="breadcrumb-item"><a href="{{ $BrRoute }}">{{ $pagetitle }}</a></li>
          @else
            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $pagetitle }}</a></li>
          @endif
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->
