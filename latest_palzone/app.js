PATH = 'search.php';

var app = angular.module("myApp",[]);
   //live search controller for welcome view and welcome controller
    app.controller('SearchController', function($scope, $http){
    $scope.url = 'search.php'; // the get request page
    $scope.search = function (){
        //create the http post request
        //the data holds the search key
        //the request is a json request
        $http.post($scope.url,
        {"data":$scope.keybords}
                ).success(function (data, status){
                    $scope.status = status;
                    $scope.data = data;
                    $scope.result = data;
					$scope.showstartcard=true;
                }).error(function (data, status){
                    $scope.data = data || "Request Failed";
                    $scope.status = status;
				
                });
    };
});