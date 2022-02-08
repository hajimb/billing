<style type="text/css">
	.repeater-heading button{margin: 20px;}
</style>
<?php 
$id = '';
if($main_id > 0){
	$id = 'repeater';
}else{
	$id = '';
}
?>
<section class="content">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="card card-warning">
				<div class="card-header">
				<h3 class="card-title"><?= $todo;?> Raw Material</h3>
				</div>
				<form role="form" method="post" name="mainfrm" id="mainfrm">
					<div id="<?= $id;?>">
					    <!-- Repeater Heading -->
					    <?php if($main_id>0){?>
					    <div class="repeater-heading text-right">
					        <button class="btn btn-primary repeater-add-btn" type="button">
					            Add
					        </button>
					    </div>
						<?php } ?>
					    <div class="clearfix"></div>
					    <div class="card-body">
							<?php 
								$favorite= $data['favorite'] ?? 0;
								$stock_status= $data['stock_status'] ?? 1;
							?>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="cat_id">Select Category</label>
										<?php 
											$js = 'id="cat_id" class="form-control"';
											echo form_dropdown('cat_id', $category, $data['cat_id'] ?? "",$js);
										?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="item_name">Item name</label>
										<input type="text" id="item_name" name="item_name" autocomplete="off" class="form-control" required value="<?= $data ['item_name'] ?? '';?>">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="short_code">Short Code</label>
										<input type="text" id="short_code" name="short_code" autocomplete="off" class="form-control" required value="<?= $data ['short_code'] ?? '';?>">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="price">Price</label>
										<input type="text" id="price" name="price" autocomplete="off" class="form-control" required value="<?= $data['price'] ?? '';?>"/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="stock_status">Stock Status</label>
										<select class="form-control" name="stock_status" id="stock_status">
												<option value="">Select Stock Status</option>
												<option value="1" <?php if($stock_status  == 1){ echo 'selected';}?>>Yes</option>
												<option value="0" <?php if($stock_status  == 0){ echo 'selected';}?>>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="custom-control custom-checkbox" style="margin-top: 35px;">
											<input class="custom-control-input permission" type="checkbox" name="favorite"  id="favorite" value="1" <?php if($favorite == 1){ echo 'checked';}?>/>
											<label for="favorite" class="custom-control-label">Favorite</label>
										</div>
									</div>
								</div>
								<?php if($main_id>0){									
									$count = count($item_rawm);
									// print_r($item_rawm);
									if($count > 0){
										foreach($item_rawm as $key =>$val){
								?>
									<div class="items" data-group="rawmaterial">
								        <div class="item-content" style="padding: 0 20px;">
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="rawmaterial">Raw Material</label>
														<?php 
															$js = 'id="rawmaterial_id" class="form-control rawmaterial_id" data-name="rawmaterial_id"';
															echo form_dropdown('rawmaterial_id', $rawmaterial, $item_rawm[$key]['rawmaterial_id'],$js, true);
														?>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="quantity">Quantity</label>
														<div class="input-group mb-3">
															<input type="text" id="quantity" name="quantity" data-name="quantity" class="form-control" value="<?= $item_rawm[$key]['quantity'];?>">
															<div class="input-group-append">
																<span class="input-group-text lblunits"><?= $data['units'] ?? '';?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-3" style="margin-top: 30px;">
													<div class="pull-right repeater-remove-btn">
											            <button class="btn btn-danger remove-btn">
											                Remove
											            </button>
											        </div>
												</div>
											</div>
								        </div>
								    </div>	
								<?php	
									}}else{
								?>
									<div class="items" data-group="rawmaterial">
								        <div class="item-content" style="padding: 0 20px;">
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="rawmaterial">Raw Material</label>
														<?php 
															$js = 'id="rawmaterial_id" class="form-control rawmaterial_id" data-name="rawmaterial_id"';
															echo form_dropdown('rawmaterial_id', $rawmaterial, $data['rawmaterial_id'] ?? "",$js, true);
														?>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="quantity">Quantity</label>
														<div class="input-group mb-3">
															<input type="text" id="quantity" name="quantity" data-name="quantity" autocomplete="off" class="form-control numberOnly" value="<?= $data ['quantity'] ?? '';?>">
															<div class="input-group-append">
																<span class="input-group-text lblunits"><?= $data ['units'] ?? '';?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-3" style="margin-top: 30px;">
													<div class="pull-right repeater-remove-btn">
											            <button class="btn btn-danger remove-btn">
											                Remove
											            </button>
											        </div>
												</div>
											</div>
								        </div>
								    </div>	
								<?php }}?>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-sm-4">
								<input type="hidden" id="main_id" name="main_id" value="<?= $main_id; ?>">
								<input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $session_data['restaurant_id'];?>">
								<button class="btn btn-primary saveChange" id="update" type="submit" data-form="mainfrm"><i class="fa fa-save" style="display: none"></i>Save </button>
								<button class="btn btn-warning goBack" type="button"><i class="fa fa-save" style="display: none"></i>Cancel </button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>