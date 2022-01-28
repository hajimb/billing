<input type="hidden" id="rurl" value="<?= $rurl;?>">
<section class="content">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="card card-warning">
				<div class="card-header">
				<h3 class="card-title"><?= $todo;?> Raw Material</h3>
				</div>
				<form role="form" method="post" name="mainfrm" id="mainfrm">
					<div class="card-body">
						<div class="row">
						<div class="col-sm-3">
								<div class="form-group">
									<label for="rawmaterial">Raw Material</label>
									<?php 
										$js = 'id="rawmaterial_id" class="form-control"';
										echo form_dropdown('rawmaterial_id', $rawmaterial, $data['rawmaterial_id'] ?? "",$js);
									?>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="stock">Quantity</label>
									<input type="hidden" id="oldstock" name="oldstock"value="<?= $data['stock'] ?? '';?>">
									<input type="number" id="stock" name="stock" autocomplete="off" class="form-control" value="<?= $data['stock'] ?? '0';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="invoice_date">Used Date</label>
									<input type="date" id="invoice_date" name="invoice_date" autocomplete="off" class="form-control" required value="<?= $data['invoice_date'] ?? '';?>"/>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4">
									<input type="hidden" id="main_id" name="main_id" value="<?= $main_id; ?>">
									<input type="hidden" name="entry_type" value="U">
									<input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $session_data['restaurant_id'];?>">
									<button class="btn btn-primary saveChange" id="update" type="submit" data-form="mainfrm"><i class="fa fa-save" style="display: none"></i>Save </button>
									<button class="btn btn-warning goBack" type="button"><i class="fa fa-save" style="display: none"></i>Cancel </button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>