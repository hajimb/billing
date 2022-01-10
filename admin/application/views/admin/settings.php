<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card Body-->
                <div class="card-body fs-6 p-10 p-lg-15"> 
                    <h1 class="anchor fw-bolder">Settings</h1> 
                    <!--begin::Section-->
                    <div class="py-1">
                        <!--begin::Block-->
                        <div class="py-5">
                            <div class="rounded border p-10">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">General Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Bigcommerce API Settings</a>
                                    </li> 
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <?php $updatee 	= $this->session->userdata('updatedata');
                                    if(isset($updatee) && !empty($updatee)){ ?> 
                                    <div class="alert alert-dismissible alert-success align-items-center p-5 mb-10 d-flex" id="succmsg">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10"> 
                                        <span class="succmsg">Settings saved successfully.</span>
                                    </div>
                                    <!--begin::Close-->
                                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                        <span class="svg-icon svg-icon-2x svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Close-->
                                </div>
                                    <?php $this->session->unset_userdata('updatedata'); } ?>

                                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                        <div class="kt-portlet__body">
                                            <div class="kt-widget12">
                                                <div class="kt-widget12__content">
                                                    <form action="<?php echo base_url(); ?>admin/settings/generalsetting" class="kt-form kt-form--label-right" accept-charset="utf-8" method="post">
                                                        <div class="kt-portlet__body">
                                                            <div class="form-group row mb-2">
                                                                <label for="protocol" class="col-2 col-form-label">Protocol  </label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["protocol"] ?>" id="protocol" name="protocol" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="smtp_user" class="col-2 col-form-label">Smtp User  </label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["smtp_user"] ?>" id="smtp_user" name="smtp_user" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="smtp_port" class="col-2 col-form-label">Smtp Port</label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["smtp_port"] ?>" id="smtp_port" name="smtp_port" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="smtp_host" class="col-2 col-form-label">Smtp Host  </label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["smtp_host"] ?>" id="smtp_host" name="smtp_host" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="smtp_pass" class="col-2 col-form-label">Smtp Pass  </label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["smtp_pass"] ?>" id="smtp_pass" name="smtp_pass" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-2">
                                                                <label for="smtp_pass" class="col-2 col-form-label">Email Address</label>
                                                                <div class="col-10">
                                                                    <input value="<?php echo $settingdata["admin_email"] ?>" id="admin_email" name="admin_email" type="text" class="form-control">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="kt-portlet__foot">
                                                            <div class="kt-form__actions">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                    </div>
                                                                    <div class="col-10">
                                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                                        <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
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
                            </div>
                        </div>
                        <!--end::Block-->
                        
                    </div>
                    <!--end::Section-->
                    
                </div>
                <!--end::Card Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->