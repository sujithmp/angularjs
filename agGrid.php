<html>
    <head>
        <!-- load aggrid css cdn -->
        <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
        <!-- load angular js cdn -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <!-- load aggrid js cdn -->
        <script src="https://unpkg.com/ag-grid@13.2.0/dist/ag-grid.js"></script>

    </head>

    <body ng-app="my-ag" ng-controller="agCtrl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>Grid</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div ag-grid="gridOptions" class="ag-fresh"   id="myGrid" style="height: 100%; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <script>
            agGrid.initialiseAgGridWithAngular1(angular);
            var app = angular.module('my-ag', ["agGrid"]);
            app.controller('agCtrl', function($scope) {
                let vm = this;
                $scope.gridOptions = {
                    
                    columnDefs: [
                        {headerName: 'Make', field: 'make'},
                        {headerName: 'Model', field: 'model'},
                        {headerName: 'Price', field: 'price'}
                    ],
                    rowData: [
                        {make: 'Toyota', model: 'Celica', price: 35000},
                        {make: 'Ford', model: 'Mondeo', price: 32000},
                        {make: 'Porsche', model: 'Boxter', price: 72000}
                    ],
                    enableSorting: true,
                    enableColResize: true,
                    enableFilter: true,
                    onGridReady: function(event) {
                        sizeToFit()
                    }    
                };
                vm.test = function() {
                   console.log('runs fine!');
                }
                vm.test();
                function sizeToFit() {
                    $scope.gridOptions.api.sizeColumnsToFit();
                }
            });
        </script>
    </body>
</html>
