<?php 
// echo "<pre>";
// print_r($bill);
// $order = $this->db->query("SELECT * FROM bill_head where Id = {$_GET['id']}");
// foreach($order->fetch_array() as $k => $v){
// 	$$k= $v;
// }
// $items = $this->db->query("SELECT o.*,p.name FROM bill_item o inner join item p on p.item_id = o.item_id where o.bill_id = $id ");
?>
<style>
	@media print {
		@page {
			size: 80mm auto;
		}
	}
	body.receipt { 
		width: 80mm ;
		height:100%;
		margin: 5mm;
	}
	body.receipt .sheet { width: 80mm; height:100%} /* change height as you like */
	@media print { body.receipt { width: 80mm; height:100% } } /* this line is needed for fixing Chrome's bug */

</style>
<body class="receipt">
<section class="sheet">
	<table width="100%">
		<?php if($restaurant['photo_file'] != '' ){ ?>
		<tr>
			<td class="text-center"><img src="<?= base_url();?>assets/images/logo/<?= $restaurant['photo_file']; ?>" style="width:70%"></td>
		</tr>
		<?php } ?>
		<tr>
			<td class="text-center"><h2><b><?php echo $restaurant['restaurant_name'] ?></b></h2></td>
		</tr><tr>
			<td class="text-center"><?php echo $restaurant['restaurant_address'] ?></td>
		</tr><tr>
			<td class="text-center">Call: <?php echo $restaurant['contact_no'] ?></td>
		</tr>
		<tr class="border-top border-bottom">
			<td>
				Name : 
			</td> 
		</tr>
		<tr>
			<td>
				Date : <?php echo date("d/m/Y h:i:s",strtotime($bill['billHead']['created_date'])) ?> <br />
				Cashier : CASHIER <br />
				Bill No : <?php echo $bill['billHead']['invoice_no'] ?>
			</td> 
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr class="border-top border-bottom">
						<td width="50%">Item </td> 
						<td width="10%" class="text-center">Qty</td> 
						<td width="20%" class="text-right">Price</td> 
						<td width="20%" class="text-right">Amount</td> 
					</tr>
					<?php 
						$qnty = 0;
						foreach($bill['billItems'] as $billd){
							$qnty 			= intval($qnty) + intval($billd['qty']); 
						?>
					<tr>
						<td><?= $billd['item_name'] ?></td> 
						<td class="text-center"><?= $billd['total_qty'] ?></td> 
						<td class="text-right"><?= number_format($billd['amount'],2) ?></td> 
						<td class="text-right"><?= number_format($billd['total_price'],2) ?></td> 
					</tr>
					<?php } ?>
					<tr class="border-top">
						<td class="text-right">Total Qty : <?= $qnty; ?></td> 
						<td colspan = 2 class="text-right">Sub Total</td> 
						<td class="text-right"><?= number_format($bill['billHead']['sub_total'],2) ?></td> 
					</tr>
					<?php if(isset($bill['billHead']['tax_amt']) && $bill['billHead']['tax_amt'] >0){ ?>
					<tr>
						<td class="text-right"><?= number_format($bill['billHead']['sub_total'],2) ?> @ SGST</td> 
						<td colspan = 2 class="text-right"><?= $bill['billHead']['sgst_percent'] ;?>%</td> 
						<td class="text-right"><?= number_format(($bill['billHead']['sgst_amt']),2); ?></td> 
					</tr>
					<tr>
						<td class="text-right"><?= number_format($bill['billHead']['sub_total'],2) ?> @ CGST</td> 
						<td colspan = 2 class="text-right"><?= $bill['billHead']['cgst_percent'] ;?>%</td> 
						<td class="text-right"><?= number_format(($bill['billHead']['cgst_amt'] ),2); ?></td> 
					</tr>
					<tr>
						<td class="text-right"><?= number_format($bill['billHead']['sub_total'],2) ?> @ VAT</td> 
						<td colspan = 2 class="text-right"><?= $bill['billHead']['vat_percent'] ;?>%</td> 
						<td class="text-right"><?= number_format(($bill['billHead']['vat_amt']),2); ?></td> 
					</tr>
					<?php } ?>
					<?php if(isset($bill['billHead']['discount_amt']) && $bill['billHead']['discount_amt'] >0){ ?>
						<tr class="border-top border-bottom">
							<td colspan = 2 class="text-right">Total</td> 
							<td colspan = 2 class="text-right"><?= number_format(($bill['billHead']['total']),2); ?></td> 
						</tr>
						<tr class="border-top border-bottom">
							<td colspan = 2 class="text-right">Discount</td> 
							<td colspan = 2 class="text-right"><?= number_format($bill['billHead']['discount_amt'],2); ?></td> 
						</tr>
					<?php } ?>
						<tr class="border-top border-bottom">
							<td colspan = 2 class="text-right">Grand Total</td> 
							<td colspan = 2 class="text-right"><?= number_format($bill['billHead']['grand_total'],2); ?></td> 
						</tr>
					<?php if(false) { ?>
					<tr class="border-top">
						<td colspan = 2 class="text-right"><small>Round Off</small></td> 
						<td colspan = 2 class="text-right"><small>-0.40</small></td> 
					</tr>
					<tr class="border-bottom">
						<td colspan = 2 class="text-right"><b>Grand Total</b></td> 
						<td colspan = 2 class="text-right"><b>386.00</b></td> 
					</tr>
					<?php } ?>
				</table>
			</td> 
		</tr>
		<?php if($restaurant['fssai_no'] != '' ){ ?>
		<tr>
			<td class="text-center"><b>FSSAI Lic No <?= $restaurant['fssai_no'] ;?></b></td>
		</tr>
		<?php }if($restaurant['company_name'] != '' ){ ?>
		<tr>
			<td class="text-center"><b><?= $restaurant['company_name'] ;?></b></td>
		</tr>
		<?php } if($restaurant['gstin_no'] != '' ){ ?>
		<tr>
			<td class="text-center"><b>GSTIN <?= $restaurant['gstin_no'] ;?></b></td>
		</tr>
		<?php } if($restaurant['email'] != '' ){ ?>
		<tr>
			<td class="text-center">
				write to us at <br />
				<b><?= $restaurant['email'] ;?></b>
			</td>
		</tr>
		<?php } if($restaurant['qr_code'] != '' ){ ?>
		<tr>
			<td class="text-center"><img src="<?= base_url();?>assets/images/qr/<?= $restaurant['qr_code']; ?>" style="width:70%"></td>
		</tr>
		<?php } ?>
	</table>
</section>
</body>