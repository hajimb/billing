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
									<input type="text" id="rawmaterial" name="rawmaterial" autocomplete="off" class="form-control"  value="<?= $data ['rawmaterial'] ?? '';?>">
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