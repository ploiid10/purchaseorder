<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary">
                    <td>Ingredient</td>
                    <td>Quantity</td>
                    <td>Unit</td>
                    </thead>
                </table>
        </div>
    </div>
</div>
<script>
   var table = $('table').DataTable({
        "ajax" : '<?php echo base_url()?>inventory/fetchInventory',
        'columns' : [
            {'data' : 'ingredient'},
            {'data' : 'quantity'},
            {'data' : 'unit'}
        ]
    });
</script>