

var app = angular.module("purchasingApp", []);
const url = "http://localhost/purchaseorder/";
app.controller("purchaseCtrl", function($scope, $http) {
    $scope.menu = {};
    $scope.selected = {};
    $scope.purchases = [];
    $scope.name = "";
    $scope.fetchMenu = function(){
        $http.get(url+"menu/get/all").then(function(response){
            $scope.menu = response.data.data;
         
        });
        
    }
    $scope.addItem = function(){
      if($scope.purchases.length == 0){
      if($scope.selected.name != undefined){
        $scope.purchases.push({id: $scope.selected.id, description : $scope.selected.name, quantity : 1, price : $scope.selected.price});
      }
      }else{
        var inLoop = false;
        var index = 0;
        for(var i in $scope.purchases){
            if($scope.purchases[i].description == $scope.selected.name){
              index = i;
              inLoop = true;
              break;
            }
        }
        if(inLoop){
          $scope.purchases[index].quantity = +$scope.purchases[index].quantity+1;
        }else{
          $scope.purchases.push({id: $scope.selected.id, description : $scope.selected.name, quantity : 1, price : $scope.selected.price});
          inLoop = false;
        }
      }
    }
    $scope.remove = function(index){
     if($scope.purchases[index].quantity == 0){
        $scope.purchases.splice(index,1);
     }
    }

    $scope.addPurchase = function(){
      var doc = new jsPDF('p','mm',[200,300]);
      doc.setFontSize(16);
      doc.text('Wadys Bistro',35,10,'center');
      doc.setFontSize(10);
      doc.text('Official Receipt',35,15,'center');
      doc.setFontSize(8);
      doc.text('Address : Davao City', 5,20)
      var date = new Date();
      doc.text('Date : '+ date.toLocaleDateString("en-US"), 40,20);
      doc.text('TIN : ', 5,25);
      doc.text('Description', 5, 30);
      doc.text('Qty', 25, 30);
      doc.text('Price', 37, 30);
      doc.text('Amount', 50, 30);
      doc.setFontSize(8);
      var x = 0;var sum = 0;
      for(var i in $scope.purchases){
       x  = (+i + +1) * 5;
        doc.text($scope.purchases[i].description, 5, 30 + x);
        doc.text($scope.purchases[i].quantity+"", 25, 30 + x);
        doc.text($scope.purchases[i].price+"", 35, 30 + x);
        var price = +$scope.purchases[i].price * +$scope.purchases[i].quantity;
        sum += price;
        doc.text(""+parseFloat(price).toFixed(2), 50, 30 + x);
      }
      doc.text(""+parseFloat(sum).toFixed(2), 50, 35 + x);
      doc.output('dataurlnewwindow'); 
      $http.post("/purchaseorder/purchasing/addPurchase",{ purchases :$scope.purchases, name : $scope.name + "- Walk-in"}).then(function(response){  
        $scope.name = '';
        $scope.purchases = [];
      });
    }
    $scope.fetchMenu();

});


