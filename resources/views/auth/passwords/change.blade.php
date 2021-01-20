@extends('layouts.admin')
@section('page_title', 'Change password')
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid form-intervale-top">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                         id="kt_page_portlet">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label"></div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#"
                                   class="btn btn-clean kt-margin-r-10">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">Back</span>
                                </a>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-brand">
                                        <i class="la la-check"></i>
                                        <span class="kt-hidden-mobile">Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin::Form-->
                        <div class="form-group row">
                            <div class="col-md-6 offset-3">
                                <div class="form-group">
                                    <label for="current_password" class="col-form-label ">Current Password</label>
                                    <input class="form-control" placeholder="Enter Current Password" name="current_password" type="password"
                                           id="current_password">

                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="col-form-label ">New Password</label>
                                    <input class="form-control" placeholder="Enter New Password" name="password" type="password"
                                           id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-form-label ">Current Password</label>
                                    <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password"
                                           id="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <!--end::Portlet-->
    </div>
@endsection
