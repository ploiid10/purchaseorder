<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Details</title>
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/";?>bootstrap/css/bootstrap.min.css">
    <style>
    @page { size: auto;  margin: 5mm; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
        <table class="table table-bordered table-striped text-center mt-5">
            <thead>
                <tr>
                <td>Menu</td>
                <td>Qty</td>
                <td>Price</td>
                <td>Subtotal</td>
                </tr>
            </thead>
           <tbody>
           <?php  foreach($ordes as $order) :?>
            <tr>
            <td><?php echo $order['name']?></td>
            <td><?php echo $order['quantity']?></td>
            <td><?php echo $order['price']?></td>
            <td><?php echo $order['subtotal']?></td>
            </tr>
           </tbody> 
          <?php endforeach;?>
          <tfoot>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo $sum;?></td>
          </tfoot>
        </table>
        </div>
    </div>
</body>
<script src="<?php echo base_url()."assets/js/";?>jquery/jquery.min.js"></script>

<script>
$(document).ready(function(){
    setTimeout(() => {
        window.print();
        window.close();
    }, 1000);
}); 
</script>
</html>