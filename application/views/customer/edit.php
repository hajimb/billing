<style>
	/* .ui-datepicker-calendar{background:#FFF} */
	.ui-datepicker-calendar th ,.ui-datepicker-calendar td{padding:8px}
	.ui-datepicker-prev{float: left;cursor: pointer;}
	.ui-datepicker-next{float: right;cursor: pointer;}
	.ui-datepicker-month{margin-left:40px}
	#ui-datepicker-div{padding: 20px;border:1px solid #000;background:#FFF}
</style>
<section class="content">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="card card-warning">
				<div class="card-header">
				<h3 class="card-title"><?= $todo;?> Customer</h3>
				</div>
				<form role="form" method="post" name="mainfrm" id="mainfrm">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="c_name">Name</label>
									<input type="text" id="c_name" name="c_name" autocomplete="off" class="form-control" required value="<?= $data ['c_name'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input type="text" id="email" name="email" autocomplete="off" class="form-control" required value="<?= $data ['email'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="mobile">Mobile / Phone No</label>
									<input type="text" id="mobile" name="mobile" autocomplete="off" class="form-control" onkeypress="return isNumber(event)" required value="<?= $data ['mobile'] ?? '';?>">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="dob">DoB</label>
									<input type="date" id="dob" name="dob" autocomplete="off" class="form-control" required value="<?= $data['dob'] ?? '';?>"/>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="doa">DoA</label>
									<input type="date" id="doa" name="doa" autocomplete="off" class="form-control" required value="<?= $data['doa'] ?? '';?>"/>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label for="doa">Address</label>
									<textarea id="address" name="address" class="form-control" autocomplete="off" rows="4"><?= $data['address'] ?? '';?></textarea>
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