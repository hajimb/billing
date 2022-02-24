<table class="table data-table" id="8">
    <thead>
        <tr>
            <th colspan="2">Table: <?= $billHead['tablename']; ?></th>
            <th colspan="2" class="text-right">Invoice No: <?= $billHead['invoice_no']; ?></th>
            <input type="hidden" name="bill_print_id" id="bill_print_id" value="<?= $billHead['Id'];?>">
        </tr>
        <tr>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Amount</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach($billItems as $item){ ?>
        <tr>
            <td><?= $item['item_name']; ?></td>
            <td><?= $item['total_qty']; ?></td>
            <td class="text-right"><?= number_format($item['amount'],2); ?></td>
            <td class="text-right"><?= number_format($item['total_price'],2); ?></td>
        </tr>

    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-right">Sub Total: </th>
            <th class="text-right"><?= $billHead['sub_total']; ?></th>
        </tr>
<?php if($billHead['tax_amt'] > 0) {?>
        <tr>
            <th colspan="3" class="text-right">Tax: </th>
            <th class="text-right"><?= $billHead['tax_amt']; ?></th>
        </tr>
        <tr>
            <th colspan="3" class="text-right">Total: </th>
            <th class="text-right"><?= $billHead['total']; ?></th>
        </tr>
<?php } ?>
        <tr>
            <th colspan="3" class="text-right">Discount: </th>
            <th class="text-right"><?= $billHead['discount_amt']; ?></th>
        </tr>
        <tr>
            <th colspan="3" style="text-align:right">Grand Total: </th>
            <th class="text-right"><?= $billHead['grand_total']; ?></th>
        </tr>
    </tfoot>
</table>