<html>
    <head>
        <title>Home</title>
        <!-- include jquery ui css cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    </head>
    <body ng-app="datepickerApp" ng-controller="datePickerCtlr as demo">
        <!-- datepicker html -->
        <div id="datepicker">
            <input type="text" id="datepicker23" ng-model="datepicker" datepicker>
        </div>
        <div id="datepicker2">
            <input type="text" id="datepicker226" ng-model="to" datepicker>
        </div>

        <!-- include jquery js cdn link -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <!-- include angular js cdn link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular.min.js"></script>
        

        <script>
            var app = angular.module('datepickerApp', []);
            app.directive("datepicker", function () {
                return {
                    restrict: "A",
                    require: "ngModel",
                    link: function (scope, elem, attrs, ngModelCtrl) {
                        var updateModel = function (dateText) {
                            scope.$apply(function () {

                                let { id : currDatepickerId } = attrs;
                                let __opts = {
                                    dateFormat: "yy-mm-dd",
                                    onSelect: function (dateText) {
                                        updateModel(dateText);
                                    }
                                }; 
                                ngModelCtrl.$setViewValue(dateText);
                                if(currDatepickerId == 'datepicker226') {
                                    let __datepicker23 = document.querySelector("#datepicker23");
                                    var angularElem = angular.element(__datepicker23);
                                    let {datepickerOptions} = scope;
                                    angularElem.datepicker('option','maxDate',dateText);
                                }
                                else {
                                    let __datepicker226 = document.querySelector("#datepicker226");
                                    var angularElem = angular.element(__datepicker226);
                                    angularElem.datepicker('option','minDate',dateText);
                                }
                            });
                        };
                        var options = {
                            dateFormat: "yy-mm-dd",
                            changeMonth: false,
                            onSelect: function (dateText) {
                                updateModel(dateText);
                            },
                        }; 
                        elem.datepicker(options);
                    }
                }
            });
            app.controller('datePickerCtlr', function($scope) {
                $scope.datepicker = '2022-06-01';
                
                $scope.to = new Date().toJSON().split('T')[0];
                $scope.datepickerOptions = {
                    dateFormat: 'yy-mm-dd',
                    changeMonth: false,
                    changeYear: false,
                    // yearRange: '2000:2050',
                    // minDate: new Date(2000, 1 - 1, 1),
                    // maxDate: new Date(2022, 12 - 1, 31),
                    showButtonPanel: true
                };
            });

        </script>
    </body>
</html>