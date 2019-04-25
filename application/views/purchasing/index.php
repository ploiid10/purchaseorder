<div class="content-wrapper" ng-app="purchasingApp" ng-controller="purchaseCtrl">
    <br>
    <div class="row">
   <div class="col-md-4 offset-md-4">
   <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Customer Name</div>
            </div>
            <input type="text" class=" form-control" ng-model="name">
            </div>
   </div>
    <div class="col-md-4 offset-md-4">
        <select class="form-control" ng-model="selected" ng-options="y.name for (x, y) in menu">
        </select>

    </div>
    <div class="col-md-4">
        <button class="btn btn-success" ng-click="addItem()" >Add</button>
    </div>
    </div>
    <br>
    <h1 class="text-center  mt-4">Order Requests</h1>
    <div class="col-md-12 offset-md-1 mt-5 text-center" ng-show="purchases.length>0 && purchases.length <= 40">
        
    <div class="row">
           <div class="col-md-2"><label>Description</label></div>
            <div class="col-md-4"><label>Quantity</label></div>  
            <div class="col-md-2"><label>Price</label></div>
            <label class="col-md-2"><label>SubTotal</label></div> 
        <div>
        <div class="row mt-2" ng-repeat="item in purchases">
        <div class="col-md-2">{{item.description}}</div>
        <div class="input-group col-md-2 offset-md-1">
                <div class="input-group-prepend">
                <button class="btn btn-danger" ng-click="item.quantity = item.quantity - 1;remove($index)">-</button>
                </div>
                <input type="text" style="text-align:center;" class="form-control" ng-model="item.quantity" readonly>
                <div class="input-group-append">
                <button class="btn btn-success" ng-click="item.quantity = item.quantity + 1">+</div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">{{item.price}}</div>
        <div class="col-md-2">{{item.price * item.quantity }}</div>   

        </div>
        <div class="row  mt-5">
            <div class="col-md-8">
        </div>
        <div class="col-md-2 justify-content-center">
        <button class="btn btn-primary" ng-click="addPurchase()">Proceed</button>
</div>
    
</div>  

</div>


  
<div>

</div>

<iframe  id="output" frameborder="0"></iframe>

<script src="<?php echo base_url()?>assets/js/purchasing-controller.js"></script>



