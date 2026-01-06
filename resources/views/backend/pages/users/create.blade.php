@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
  <style>
    .img-account-profile {
      height: 10rem;
    }

    .rounded-circle {
      border-radius: 50% !important;
    }

    .card {
      box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
      font-weight: 500;
    }

    .card-header:first-child {
      border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
      padding: 1rem 1.35rem;
      margin-bottom: 0;
      background-color: rgba(33, 40, 50, 0.03);
      border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
  </style>
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('user.list') }}
    @endslot
    @slot('pagetitle')
      Edit Profile
    @endslot
    @slot('title')
      User Information Create
    @endslot
  @endcomponent
  <div class="form-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" class="needs-validation" action="{{ route('user.store') }}" enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="container-xl px-4 mt-4">
                <div class="row">

                  <div class="col-xl-4">
                    <!-- Profile picture card-->

                    <div class="card mb-4 mb-xl-0">
                      <div class="card-header">Profile Picture</div>
                      <div class="card-body text-center">
                        <!-- Profile picture image -->
                        <img id="previewImage" class="img-account-profile rounded-circle mb-2" src="" alt="Profile Picture" width="150"
                          height="150">
                        <!-- Profile picture help block -->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button -->
                        <input type="file" name="profile_picture" id="profilePictureInput" class="form-control d-none" accept="image/*"
                          onchange="previewFile()">
                        <button class="btn btn-primary" type="button" onclick="document.getElementById('profilePictureInput').click()">
                          Upload new image
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                      <div class="card-header">Personam Information</div>
                      <div class="card-body">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                          <!-- Form Group (first name)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" name="first_name" id="inputFirstName" type="text" placeholder="Enter your first name"
                              value="{{ isset($edit_data->first_name) ? $edit_data->first_name : ' ' }}">
                            <span class="required">*</span>
                            @error('first_name')
                              <span class="error-msg">{{ $message }}</span>
                            @enderror
                          </div>
                          <!-- Form Group (last name)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" name="last_name" id="inputLastName" type="text" placeholder="Enter your last name"
                              value="{{ isset($edit_data->last_name) ? $edit_data->last_name : ' ' }}">
                          </div>
                        </div>
                        <!-- Form Row        -->
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                          <label class="small mb-1" for="inputEmailAddress">Email address</label>
                          <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Enter your email address"
                            value="{{ isset($edit_data->email) ? $edit_data->email : ' ' }}">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Enter your Password">
                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="confirm_password">Confirm Password</label>
                            <input class="form-control" name="confirm_password" id="confirm_password" type="password"
                              placeholder="Confirm Your Password">
                          </div>
                        </div>

                        <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Phone number</label>
                            <input class="form-control" name="mobile" id="inputPhone" type="tel" placeholder="Enter your phone number"
                              value="{{ isset($edit_data->mobile) ? $edit_data->mobile : ' ' }}">
                          </div>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputBirthday">User Role</label>
                            <select class="form-control" name="user_role_id" id="exampleFormControlSelect12">
                              <option value="">Select User Role</option>
                              @foreach ($user_role as $id => $role)
                                <option value="{{ $id }}" {{ old('user_role_id', $edit_data->user_role_id ?? '') == $id ? 'selected' : '' }}>
                                  {{ $role }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    function previewFile() {
      const file = document.getElementById("profilePictureInput").files[0]; // Get the selected file
      const preview = document.getElementById("previewImage"); // Get the image element
      const reader = new FileReader(); // Create a FileReader object

      reader.onloadend = function() {
        preview.src = reader.result; // Set the image src to the uploaded file
      };

      if (file) {
        reader.readAsDataURL(file); // Read the file and trigger onloadend
      }
    }
  </script>
@endsection
