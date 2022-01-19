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
	body.receipt .sheet { width: 80mm; height:100%} /* change height as you like */
	@media print { body.receipt { width: 80mm; height:100% } } /* this line is needed for fixing Chrome's bug */

</style>
<body class="receipt">
<section class="sheet">
	<table width="100%">
		<tr>
			<td class="text-center"><img src="<?= base_url();?>assets/images/punjabgrill.jpeg" style="width:70%"></td>
		</tr><tr>
			<td class="text-center"><h2><b><?php echo $restaurant['restaurant_name'] ?></b></h2></td>
		</tr><tr>
			<td class="text-center"><?php echo $restaurant['restaurant_address'] ?></td>
		</tr><tr>
			<td class="text-center">Call: <?php echo $restaurant['contact_no'] ?></td>
		</tr>
		<tr class="border-top border-bottom">
			<td>
				Name : Sagar sir (M : 9819878685)
			</td> 
		</tr>
		<tr>
			<td>
				Date : 09/01/2022 <br />
				Cashier : CASHIER <br />
				Bill No : 25590
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
					<tr>
						<td>Mexican Crock Pot </td> 
						<td class="text-center">1</td> 
						<td class="text-right">329.00</td> 
						<td class="text-right">329.00</td> 
					</tr>
					<tr>
						<td>Bottled Water</td> 
						<td class="text-center">1</td> 
						<td class="text-right">39.00</td> 
						<td class="text-right">39.00</td> 
					</tr>
					<tr class="border-top">
						<td class="text-right">Total Qty : 2</td> 
						<td colspan = 2 class="text-right">Sub Total</td> 
						<td class="text-right">368.00</td> 
					</tr>
					<tr>
						<td class="text-right">368.00 @ SGST</td> 
						<td colspan = 2 class="text-right">2.5%</td> 
						<td class="text-right">9.20</td> 
					</tr>
					<tr>
						<td class="text-right">368.00 @ CGST</td> 
						<td colspan = 2 class="text-right">2.5%</td> 
						<td class="text-right">9.20</td> 
					</tr>
					<tr class="border-top">
						<td colspan = 2 class="text-right"><small>Round Off</small></td> 
						<td colspan = 2 class="text-right"><small>-0.40</small></td> 
					</tr>
					<tr class="border-bottom">
						<td colspan = 2 class="text-right"><b>Grand Total</b></td> 
						<td colspan = 2 class="text-right"><b>386.00</b></td> 
					</tr>
				</table>
			</td> 
		</tr>
		<tr>
			<td class="text-center"><b>FSSAI Lic No 107200250012227</b></td>
		</tr><tr>
			<td class="text-center"><b>Urban Kitchen Pvt Ltd</b></td>
		</tr><tr>
			<td class="text-center"><b>GSTIN 107200250012227</b></td>
		</tr><tr>
			<td class="text-center">
				write to us at <br />
				<b>teastfdsa @gmail.com</b>
		</td>
		</tr>
	</table>
</section>
</body>