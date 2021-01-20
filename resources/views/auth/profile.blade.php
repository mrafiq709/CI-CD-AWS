@extends('layouts.admin')
@section('page_title' , 'Profile')

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
                                <a href="#" class="btn btn-clean kt-margin-r-10">
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
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label required-flag">First Name</label>
                                    <input required="" class="form-control" placeholder="Enter first name"
                                           name="first_name" type="text" id="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label required-flag">Last Name</label>
                                    <input required="" class="form-control" placeholder="Enter last name"
                                           name="last_name" type="text" id="last_name">
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <div>
                                        <label for="avatar" class="col-form-label">Avatar</label>
                                    </div>
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
                                         id="kt_user_edit_avatar">
                                        <div class="kt-avatar__holder" id="avatar-preview-image"
                                             style="background-image: url(https://app-management-hoosier-dev.s3.ap-southeast-1.amazonaws.com/managers/1594969708_b2.png); background-size: 100% 100%;"></div>
                                        <label class="kt-avatar__upload " data-toggle="kt-tooltip" title=""
                                               data-original-title="Thay đổi">
                                            <i class="fa fa-pen" style="margin-left: 30px"></i>
                                            <input accept="image/*" id="avatar" class="form-control upload_image"
                                                   data-category-upload="avatar" data-insert-field="avatar"
                                                   name="upload_file" type="file">
                                            <input type="hidden" name="avatar" value="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="col-form-label required-flag">Email</label>
                                    <input class="form-control" required="" placeholder="Nhập địa chỉ email"
                                           name="email" type="text" id="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label required-flag">Phone</label>
                                    <input class="form-control" required="" placeholder="Enter phone number"
                                           name="phone" type="text"  id="phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="address" class="col-form-label ">Address</label>
                                    <input class="form-control" placeholder="Enter address" name="address" type="text"
                                            id="address">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="birthday" class="col-form-label ">Birthday</label>
                                    <input class="form-control form-control datepicker-input"
                                           placeholder="Enter Birthday" name="birthday" type="text"
                                           id="birthday">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="gender" class="col-form-label ">Gender</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio text-capitalize">
                                            <input checked="checked" name="gender" type="radio" value="1"> Male
                                            <span></span>
                                        </label>
                                        <label class="kt-radio text-capitalize">
                                            <input name="gender" type="radio" value="2"> Female
                                            <span></span>
                                        </label>
                                        <label class="kt-radio text-capitalize">
                                            <input name="gender" type="radio" value="3"> Other
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>

@endsection
