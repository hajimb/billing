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
	<div class="flex">
		<div class="w-100 text-center">
			<?php //if($amount_tendered > 0): ?>
			<h2><b><?php echo $restaurant['data']['restaurant_name'] ?></b></h2>
			<p><?php echo $restaurant['data']['restaurant_address'] ?></p>
			<p><b>Contact No.</b><?php echo $restaurant['data']['contact_no'] ?></p>
			
		<?php //endif; ?>
		</div>
	</div>
	<p class="text-center"><b>Invoice<?php //echo $amount_tendered > 0 ? "Receipt" : "Bill" ?></b></p>
	<hr>
	<div class="flex">
		<div class="w-100">
			<?php //if($amount_tendered > 0): ?>
			<p>Invoice Number: <b><?php echo $bill[0]['invoice_no'] ?></b></p>
		<?php //endif; ?>
			<p>Date: <b><?php echo date("M d, Y",strtotime($bill[0]['modified_date'])) ?></b></p>
		</div>
	</div>
	<hr>
	<p><b>Order List</b></p>
	<table width="100%">
		<thead>
			<tr>
				<td><b>QTY</b></td>
				<td><b>Order</b></td>
				<td class="text-right"><b>Amount</b></td>
				<td class="text-right"><b>Price</b></td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$b = count($bill);
			$i = 1;
			foreach($bill as $billd){
				if($i != $b){
			?>
			<tr>
				<td><?php echo $billd['qty'] ?></td>
				<td><p><?php echo $billd['item_name'] ?></p><?php if($billd['qty'] > 0): ?><small>(<?php echo number_format($billd['price'],2) ?>)</small> <?php endif; ?></td>
				<td class="text-right"><?php echo number_format($billd['amount'],2) ?></td>
				<td class="text-right"><?php echo number_format($billd['amount']*$billd['qty'],2) ?></td>
			</tr>
			<?php 
			$i++;
			} } ?>
		</tbody>
	</table>
	<hr>
	<table width="50%" align="right">
		<tbody>
			<tr>
				<td><b>Total Amount</b></td>
				<td class="text-right"><b><?php echo number_format($bill['bill']['bill_amt'],2) ?></b></td>
			</tr>
			<?php //if($amount_tendered > 0): ?>


			<tr>
				<td><b>Discount</b></td>
				<td class="text-right"><b><?php echo number_format($bill['bill']['discount_amt'],2) ?></b></td>
			</tr>
			<tr>
				<td><b>Tax</b></td>
				<td class="text-right"><b><?php echo number_format($bill['bill']['tax_amt'],2) ?></b></td>
			</tr>
			<tr>
				<td><b>Grand Total</b></td>
				<td class="text-right"><b><?php echo number_format($bill['bill']['total'],2) ?></b></td>
			</tr>
		<?php //endif; ?>
			
		</tbody>
	</table>
	<!-- <hr>
	<p class="text-center"><b>Order No.</b></p>
	<h4 class="text-center"><b><?php //echo $order_number ?></b></h4> -->
</div>