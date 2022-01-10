<?php 
// print_r($bill);
// $order = $this->db->query("SELECT * FROM bill_head where Id = {$_GET['id']}");
// foreach($order->fetch_array() as $k => $v){
// 	$$k= $v;
// }
// $items = $this->db->query("SELECT o.*,p.name FROM bill_item o inner join item p on p.item_id = o.item_id where o.bill_id = $id ");
?>

<style>
	.flex{
		display: inline-flex;
		width: 100%;
	}
	.w-50{
		width: 50%;
	}
	.text-center{
		text-align:center;
	}
	.text-right{
		text-align:right;
	}
	table.wborder{
		width: 100%;
		border-collapse: collapse;
	}
	table.wborder>tbody>tr, table.wborder>tbody>tr>td{
		border:1px solid;
	}
	p{
		margin:unset;
	}

</style>
<div class="container-fluid">
	<p class="text-center"><b>KOT<?php //echo $amount_tendered > 0 ? "Receipt" : "Bill" ?></b></p>
	<hr>
	<div class="flex">
		<div class="w-100">
			<?php //if($amount_tendered > 0): ?>
			<p>KOT No: <b><?php echo $kot[0]['kot'] ?></b></p>
			<p>Table: <b><?php echo $kot[0]['tablename'] ?></b></p>
		<?php //endif; ?>
			<p>Date: <b><?php echo date("M d, Y",strtotime($kot[0]['created_date'])) ?></b></p>
		</div>
	</div>
	<hr>
	<p><b>KOT Item List</b></p>
	<table width="100%">
		<thead>
			<tr>
				<td><b>QTY</b></td>
				<td><b>Item</b></td>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($kot as $kotd){
			?>
			<tr>
				<td><?php echo $kotd['qty'] ?></td>
				<td><p><?php echo $kotd['item_name'] ?></p></td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<hr>
	
	<!-- <hr>
	<p class="text-center"><b>Order No.</b></p>
	<h4 class="text-center"><b><?php //echo $order_number ?></b></h4> -->
</div>