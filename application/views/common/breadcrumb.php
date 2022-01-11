<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1><?= $page_title ;?></h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
            <?php 
            if(count($breadcrumb)>0){
                $active = "";
                for($i = 0; $i < count($breadcrumb) ; $i++){
                    if($i == (count($breadcrumb)-1)) $active = "active";
                    echo '<li class="breadcrumb-item '.$active.'">'.$breadcrumb[$i].'</li>';
                 } 
            }
            ?>
            <!-- <li class="breadcrumb-item active">Advanced Form</li> -->
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>