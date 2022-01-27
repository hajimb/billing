<?php 
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
	h2{
		font-size:24px;
	}
	td{
		font-size:12px;
	}
	.nowrap{
		white-space: nowrap;
	}
	body.receipt .sheet { width: 80mm; height:100%} /* change height as you like */
	@media print { body.receipt { width: 80mm; height:100% } } /* this line is needed for fixing Chrome's bug */

</style>
<body class="receipt">
<section class="sheet">
	<table width="100%">
		<?php if($restaurant['photo_file'] != '' ){ ?>
		<tr>
			<td class="text-center"><img src="<?= base_url();?>assets/images/<?= $restaurant['photo_file']; ?>" style="width:70%"></td>
		</tr>
		<?php } ?>
		<tr>
			<td class="text-center"><h2><b><?php echo $restaurant['restaurant_name'] ?></b></h2></td>
		</tr>
		<tr>
			<td>
				<table width="100%" >
					<tr class="border-top border-bottom">
						<td width="33%" class="text-center">Date: <br /><b><?php echo date("d/m/Y",strtotime($kot[0]['created_date'])) ?></b></td> 
						<td width="33%" class="text-center">Table No. <br /><b><?php echo $kot[0]['tablename'] ?></b></td> 
						<td width="33%" class="text-center">KOT No. <br /><b><?php echo $kot[0]['kot'] ?></b></td> 
					</tr>
					<tr class="border-top border-bottom">
						<td class="text-center">Waiter ID: <br /><b><?php echo $kot[0]['username'] ?></b></td> 
						<td class="text-center">No Of Pax. <br /><b><?php echo $kot[0]['capacity'] ?></b></td> 
						<td class="text-center">Time: <br /><b><?php echo date("h:i:s",strtotime($kot[0]['created_date'])) ?></b></td> 
					</tr>
				</table>
			</td> 
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr class="border-bottom">
						<td width="10%" class="text-center nowrap">Sr<br/>No</td> 
						<td width="40%" class="text-center">Items </td> 
						<td width="10%" class="text-center">Qnty</td> 
						<td width="40%" class="text-center">Cooking <br/>Instruction</td> 
					</tr>
					<?php 
						$i = 0;
						$total_qnty 	= 0;
						$total_items 	= 0;
						foreach($kot as $kotd){
							$i++;
							$qnty 		= $kotd['qty'];
							$itemname 	= $kotd['item_name'];

							$total_qnty = intval($total_qnty) + intval($qnty);
							$total_items++;
						?>
					<tr>
						<td class="text-center"><?= $i ?></td> 
						<td><?= $itemname;  ?></td> 
						<td class="text-center"><?= $qnty ?></td> 
						<td class="text-right"></td> 
					</tr>
					<?php } ?>
					<tr class="border-top border-bottom">
						<td colspan = 2>
							No of Items : <b><?= $total_items ;?></b> <br/><br/>
							No of Quantity : <b><?= $total_qnty ;?></b> <br/>						
						</td> 
						<td colspan = 2 class="text-right" style="vertical-align:top"><b>Signature</b></td> 
					</tr>
				</table>
			</td> 
		</tr>
	</table>
</section>
</body>