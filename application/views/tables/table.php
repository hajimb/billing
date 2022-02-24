    <div class="legend">
      <!-- <button class="btn bg-gray">Move KOT / Items</button> -->
      <span class="legend-span"><i class="fas fa-circle text-white"></i>  Blank Table</span>
      <span class="legend-span"><i class="fas fa-circle text-cyan "></i>  Order Taken</span>
      <span class="legend-span"><i class="fas fa-circle text-teal"></i>  Kitchen Accept</span>
      <span class="legend-span"><i class="fas fa-circle text-green"></i> In Cooking</span>
      <span class="legend-span"><i class="fas fa-circle text-orange"></i>  Order Ready</span>
      <span class="legend-span"><i class="fas fa-circle text-indigo"></i>  Picked Up By Waiter</span>
      <span class="legend-span"><i class="fas fa-circle text-secondary"></i>  Order On Table</span>
      <span class="legend-span"><i class="fas fa-circle text-pink"></i>  Bill Raised</span>
      <span class="legend-span"><i class="fas fa-circle text-danger"></i> Bill Paid</span>
    </div>
    <section class="content">
      <form id="mainfrm" name="mainfrm" method="POST">
        <input type="hidden" id="main_id" name="main_id" value="">
        <input type="hidden" id="table_id" name="table_id" value="">
        <input type="hidden" id="bill_id" name="bill_id" value="">
      </form>
      <div class="container-fluid">
        <div class="row p-2" id="tabledata">
        </div>
    </section>
    <script>
      var restaurant_id = <?= ($restaurant_id ?? 0); ?>;
    </script>