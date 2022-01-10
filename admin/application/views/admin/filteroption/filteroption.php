<!--begin::Content-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card Body-->
                <div class="card-body fs-6 p-10 p-lg-15"> 
                    <h1 class="anchor fw-bolder">Filter Option</h1> 
                    <!--begin::Section-->
                    <div class="py-1">
                        <div class="alert alert-success align-items-center p-5 mb-10" id="succmsg" style="display:none;">
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
                                <span class="succmsg"></span>
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
                        <!--begin::Block-->
                        <div class="py-5"> 
                            <table id="kt_datatable_example_5" class="table table-row-bordered gy-5">
                                <thead>
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th>Filter Name</th>
                                        <th>Visible in Frontend?</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                   
                                        <?php 
                                        foreach($filterdata as $filter)
                                        { ?>
                                            <tr>
                                        <td><?php echo $filter['filtername'];?></td>
                                        <td>
                                            <?php if($filter['status'] == '0') { ?>
                                                <!-- <span class="statusval<?php echo $filter['id'];?>">
                                                    <button uid="<?php echo $filter['id']; ?>" ustatus="<?php echo $filter['status']; ?>" class="btn btn-danger font-weight-bold btn-pill user_status">Inactive</a>
                                                </span> -->
                                                <span style="cursor:pointer;" class="statusval<?php echo $filter['id'];?>" onclick="updtFilterOpt('<?php echo $filter['id'];?>',<?php echo $filter['status']; ?>)"><i class="fas fa-times" style="font-size: 30px;color:#ff00009e;"></i></span>
                                            <?php } else { ?>
                                                <!-- <span class="statusval<?php echo $filter['id'];?>"> 
                                                    <button uid="<?php echo $filter['id']; ?>"  ustatus="<?php echo $filter['status']; ?>" class="btn btn-success font-weight-bold btn-pill user_status">Active</a>
                                                </span> -->
                                                <span style="cursor:pointer;" class="statusval<?php echo $filter['id'];?>" onclick="updtFilterOpt('<?php echo $filter['id'];?>',<?php echo $filter['status']; ?>)"><i class="fas fa-check" style="font-size: 30px;color:#0080008a;"></i></span>
                                            <?php } ?>
                                        </td>
                                        </tr>
                                        
                                       <?php  } ?>
                                    
                                     
                                </tbody>
                            </table>
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


<script type="text/javascript">
    function updtFilterOpt(id, status){  
        var url = '<?php echo base_url();?>admin/filteroption/updatestatus';
        var querystring = 'id='+id+'&status='+status;
        $.ajax({
            url: url,
            cache: false,
            type: 'GET',
            data:querystring,
            async: false, // must be set to false
            success: function (data, success) {
                var responseObj = JSON.parse(data);
                var newstatus = responseObj.update.status;
                console.log(newstatus);
                if(newstatus == 0){                   
                    $('.statusval'+id).html('<i class="fas fa-times" style="font-size: 30px;color:#ff00009e;"></i>');
                }else{
                    $('.statusval'+id).html('<i class="fas fa-check" style="font-size: 30px;color:#0080008a;"></i>');
                }
                $('.statusval'+id).attr('onclick','updtFilterOpt("'+id+'","'+newstatus+'")');

                $(".succmsg").text('Filter option status changed succesfully.');
                $("#succmsg").addClass("d-flex").show().fadeOut(5000, function(){ 
                    $("#succmsg").removeClass("d-flex");
                });

            }
        });
    }

	// $(document).on('click','.user_status',function(){
	// 	var id = $(this).attr('uid'); //get attribute value in variable
	// 	var status = $(this).attr('ustatus'); //get attribute value in variable
    //     var url = '<?php echo base_url();?>admin/filteroption/updatestatus';
    //     var querystring = 'id='+id+'&status='+status;
    //     $.ajax({
    //         url: url,
    //         cache: false,
    //         type: 'GET',
    //         data:querystring,
    //         async: false, // must be set to false
    //         success: function (data, success) {
    //             var responseObj = JSON.parse(data);
    //             var newstatus = responseObj.update.status;
    //             console.log(newstatus);
    //             if(newstatus == 0)
    //             {                   
    //                 $('.statusval'+id).html('<button uid='+id+' ustatus="0" class="btn btn-danger font-weight-bold btn-pill user_status">Inactive</a>');
    //             }
    //             else
    //             {
    //                 $('.statusval'+id).html('<button uid='+id+' ustatus="1" class="btn btn-success font-weight-bold btn-pill user_status">Active</a>');
    //             }
                
    //         }
    //     });
	// });
</script>