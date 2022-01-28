$(function () {
    $(document).ready(function () {
        $('#mainTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['print']
        });
    });
});