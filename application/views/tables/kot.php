    <div class="legend">
      <span class="legend-span"><i class="fas fa-circle text-yellow"></i>  New order</span>
      <span class="legend-span"><i class="fas fa-circle text-danger "></i>  In Cooking</span>
      <span class="legend-span"><i class="fas fa-circle text-green"></i> Order Ready</span>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row p-2" id="kot_data">
            </div>
        </div>
    </section>
    <script>
      var restaurant_id = <?= ($restaurant_id ?? 0); ?>;
    </script>