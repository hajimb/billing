<!DOCTYPE html>
<html lang="en">
	<head>
    
		<meta charset="utf-8" />
		<title>Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">  
		<link rel="shortcut icon" href="<?php echo $this->config->base_url();?>assets/images/favicon.png" />
		<link href="<?php echo base_url();?>assets/css/login-3.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<style type="text/css">
			.logo_loginpage{
				width: 25%;
			}
			#email-error{
				width: 100%;
			}
			#password-error{
				width: 100%;
			}
			.error{
				color: red;
			}
            .btn-brand{
                background-color: #f27231;
                border-color: #f27231;
                color: #000;
            }
		</style>
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo base_url();?>assets/images/loginbg.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a  href="<?php echo $this->config->base_url();?>admin">
									<img  class = "logo_loginpage" src="<?php echo $this->config->base_url();?>assets/images/logo.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In To Admin</h3>
								</div> 
                                <div class="alert alert-success align-items-center p-5 mb-10" id="succmsg" style="display:none;">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                        <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10"> 
                                        <span class="succmsg"></span>
                                    </div>
                                    <!--begin::Close-->
                                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                        <span class="svg-icon svg-icon-2x svg-icon-success">
                                            <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Close-->
                                </div>
                                <div class="alert alert-danger align-items-center p-5 mb-10" id="errmsg" style="display:none;">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                        <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10"> 
                                        <span class="errmsg"></span>
                                    </div>
                                    <!--begin::Close-->
                                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                        <span class="svg-icon svg-icon-2x svg-icon-danger">
                                            <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <!--end::Close-->
                                </div>
								<form class="kt-form" name = "loginForm" method="post" id="loginForm">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off" id="username">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password" id="password">
									</div>
									
									<div class="kt-login__actions">
										<input id="kt_login_signin_submit" name = "commit" type = "submit" class="btn btn-brand btn-elevate kt-login__btn-primary" value="Sign In">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
 
<script type="text/javascript">
    $(function () {

        $('#loginForm').validate({ // initialize the plugin
            rules: {
                username: {
                    required: true,
                    remote: {
                        url: "<?php echo base_url() ?>admin/login/check_username_exist",
                        type: "post",
                        data: {
                            username: function() {
                                return $( "#username" ).val();
                            }
                        }
                    }

                },
                password: { required: true }
            },
            messages: {
                username: {
                    required: "Please enter username.", 
                    remote: "Username not exist."
                },
                password: { required: "Please enter password." }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler: function (form) {
                var username = $( "#username" ).val();
                var password = $( "#password" ).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>admin/login/authenticate",
                    data: {username:username,password:password},
                    cache: false,
                    success: function(data){
                        console.log(data);
                        var data = JSON.parse(data);
                        if(data.status==1){
                            $(".succmsg").text(data.msg);
                            $("#succmsg").addClass("d-flex").show().fadeOut(5000, function(){ 
                                $("#succmsg").removeClass("d-flex");
                            });
                            window.location.href = "<?php echo base_url(); ?>admin/dashboard";
                        }else{ 
                            $(".errmsg").text(data.msg);
                            $("#errmsg").addClass("d-flex").show().fadeOut(5000, function(){ 
                                $("#errmsg").removeClass("d-flex");
                            });
                        } 
                    }
                }); 
                // return false;
            }
        });

        $(".close").click(function(){
            $(".alert-bold").hide();
        }); 
        // btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
    });
 
</script> 
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#2c77f4",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script> 
<!-- end::Global Config -->

 
 	</body>

	<!-- end::Body -->
</html>