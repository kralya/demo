(function(angular) {
    'use strict';
    angular.module('sortAngular', [])
        .controller('ExampleController', ['$scope', 'orderByFilter', '$http', function($scope, orderBy, $http) {

        var messages = [];

        $http.get('/demo/messages')
            .then(function(res){
                $scope.messages = res.data;
            });

        $scope.propertyName = 'date';
        $scope.reverse = true;
        $scope.messages = orderBy(messages, $scope.propertyName, $scope.reverse);

        $scope.sortBy = function(propertyName) {
            $scope.reverse = (propertyName !== null && $scope.propertyName === propertyName)
                ? !$scope.reverse : false;
            $scope.propertyName = propertyName;
            $scope.messages = orderBy($scope.messages, $scope.propertyName, $scope.reverse);
        };
    }]);


})(window.angular);

