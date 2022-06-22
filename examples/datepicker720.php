<html>
    <head>
        <!-- load  fontawesome  cdn-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- datepicker css -->
        <link rel="stylesheet" type="text/css" href="http://720kb.github.io/csshelper/assets/ext/src/helper.css">
        <link rel="stylesheet" href="<?=SITE_URL?>assets/css/720kb.css">
        <!-- angular js   -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="<?=SITE_URL?>assets/css/date-picker-720.js"></script>
        <style>
            .col3 ._720kb-datepicker-calendar {
                width: 25%;
            }
        </style>
    </head>
    <body ng-app="myApp" ng-controller="myCtrl">
        
    <div class="col3" style="">
        <!-- <div class="datepicker"
            date-set-hidden="true"
            
            date-format="MMMM d, y"
            date-set="2015/11/26"
            
            
            date-typer="true"
            date-disabled-dates="['2014/08/07', '2014/08/08' ]"
            button-prev='<i class="fa fa-arrow-circle-left"></i>'
            button-next='<i class="fa fa-arrow-circle-right"></i>'>
            <input ng-model="date" type="text" class="angular-datepicker-input"/>
        </div> -->
        <datepicker 
            date-format="{{defaults.dateFormat}}" 
            date-max-limit="{{defaults.dateFrom.maxDate}}"
            >
            <input ng-model="defaults.dateFrom.date" type="text"/>
        </datepicker>
        <datepicker
            date-format="{{defaults.dateFormat}}"
            date-min-limit="{{defaults.dateTo.minDate}}"
            >
            <input ng-model="defaults.dateTo.date" type="text"/>
        </datepicker>
    </div>
        <!-- angular js -->
        <script>
            var app = angular.module('myApp', ['720kb.datepicker']);
            app.controller('myCtrl', function($scope) {
                $scope.date = '01-01-2016';
                $scope.defaults = {
                    config: {
                        month: '2-digit',
                        day: '2-digit',
                        year: 'numeric'
                    },
                    dateFormat: 'MM/dd/yyyy',
                    dateTo: {
                        date:'',
                        minDate: '',
                    },
                    dateFrom: {
                        date:'',
                        maxDate:''
                    }
                }
                $scope.setDate = function(type = '') {
                    let date = new Date();             
                    if(type == 'TO') {
                        let [ day, month, year ] = date.toLocaleString('en-GB',$scope.defaults.config).split('/');
                        let __date = `${month}/${day}/${year}`;
                        $scope.defaults.dateTo.date = __date;
                        let minDate = `${month}/01/${year}`;
                        $scope.defaults.dateTo.minDate = minDate;
                    } else {
                        let [ day, month, year ] = date.toLocaleString('en-GB',$scope.defaults.config).split('/');
                        let __date = `${month}/01/${year}`;
                        $scope.defaults.dateFrom.date = __date;

                        let maxDate = `${month}/${day}/${year}`;
                        $scope.defaults.dateFrom.maxDate = maxDate;
                    }             
                };
                $scope.setDate('TO');
                $scope.setDate('FROM');
                $scope.$watch('dateFrom', function (value) {
                    if (value) {
                        $scope.defaults.dateTo.minDate = value;
                    }
                });    
                $scope.$watch('dateTo', function (value) {
                    if (value) {
                        $scope.defaults.dateFrom.maxDate = value;
                    }
                });
            });
        </script>
    </body>
</html>