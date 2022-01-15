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
									<label for="stock">Stock</label>
									<input type="text" id="stock" name="stock" autocomplete="off" class="form-control numberOnly" value="<?= $data ['stock'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="unit">Unit</label>
									<?php 
										$js = 'id="unit" class="form-control"';
										echo form_dropdown('unit', $units, $data['unit'] ?? "",$js);
									?>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="supplier_name">Supplier Name</label>
									<input type="text" id="supplier_name" name="supplier_name" autocomplete="off" class="form-control"  value="<?= $data ['supplier_name'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="invoice_no">Invoice Number</label>
									<input type="text" id="invoice_no" name="invoice_no" autocomplete="off" class="form-control"  value="<?= $data ['invoice_no'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="total_amount">Total Amount</label>
									<input type="text" id="total_amount" name="total_amount" autocomplete="off" class="form-control numberOnly"  value="<?= $data ['total_amount'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="paid_amount">Paid Amount</label>
									<input type="text" id="paid_amount" name="paid_amount" autocomplete="off" class="form-control numberOnly"  value="<?= $data ['paid_amount'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="payment_type">Select Payment Type</label>
									<?php 
										$js = 'id="payment_type" class="form-control"';
										echo form_dropdown('payment_type', $ptype, $data['payment_type'] ?? "",$js);
									?>
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
					</div>
				</form>
			</div>
		</div>
	</div>
</section>