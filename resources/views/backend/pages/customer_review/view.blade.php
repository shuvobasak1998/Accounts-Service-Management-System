@extends('layouts.master')
@section('title')
    @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('BrRoute')
            {{ route('businessinfo.index') }}
        @endslot
        @slot('pagetitle')
            {{ __('page_titles.business') }} {{ __('page_titles.information') }}
        @endslot
        @slot('title')
            {{ __('page_titles.business') }} {{ __('page_titles.information') }} {{ __('page_titles.view') }}
        @endslot
    @endcomponent

    <div class="form-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('businessinfo.store') }}" enctype = "multipart/form-data">
                            @csrf
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="name">{{ __('form.name') }}{{ __('form.en') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    {{ $business_info->name }}
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="name_bn">{{ __('form.name') }}{{ __('form.bn') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    {{ $business_info->name_bn }}

                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="short_code">{{ __('organization_info.organization_code') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    {{ $business_info->short_code }}
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="business_logo">{{ __('organization_info.organization_logo') }}</label>
                                </div>
                                <div class="col-lg-8">
																																				<img src="{{ asset('storage/' . $business_info->business_logo_path) }}"
                                                alt="Business Logo" style="height: 100px; width: 120px;">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="inverse_logo">{{__('organization_info.inverse_logo')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	<img src="{{ asset('storage/' . $business_info->inverse_logo_path) }}"
                                                alt="Inverse Logo" style="height: 100px; width: 120px;">
                                </div>
                            </div>
																												{{-- @dd($business_info); --}}
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="address">{{__('form.address')}}{{__('form.en')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->address }}
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="address_bn">{{__('form.address')}}{{__('form.bn')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->address_bn }}
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="mobile">{{__('form.mobile')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->mobile }}

                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="telephone">{{__('organization_info.telephone')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->telephone }}

                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="email">{{__('form.email')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->email }}
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-lg-4">
                                    <label for="web_address">{{__('organization_info.web_address')}}</label>
                                </div>
                                <div class="col-lg-8">
																																	{{ $business_info->web_address }}

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex gap-2 align-items-center justify-content-end">
                                        <a href="{{ url()->previous() }}"
                                            class="btn btn-secondary">{{ __('form.return') }}</a>
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
