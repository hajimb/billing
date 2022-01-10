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
                    <h1 class="anchor fw-bolder">Log</h1> 
                    <!--begin::Section-->
                    <div class="py-1">
                        <!--begin::Block-->
                        <div class="py-5">
                            <table id="kt_datatable_example_5" class="table table-row-bordered gy-5">
                                <thead>
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th>Id</th>
                                        <th>Log Meassage</th>
                                        <th>Type</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        foreach($log as $log_s)
                                        { ?>
                                    <tr>
                                        <td><?php echo $log_s['log_id']?></td>
                                        <td><?php echo $log_s['log_msg']?></td>
                                        <td><?php echo $log_s['controller']?></td>
                                        <td><?php echo $log_s['createddate']?></td>
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