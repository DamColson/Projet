var app = angular.module('warfriendsApp',[]);

app.controller('inscriptionFormCtrl', ['$scope',function($scope){
  $scope.regexMail = /^([a-zA-Zéàèçùïöëôîêûüäâ\d-_.]+)[@]((([a-zA-Zéàèçùïöëôîêûüäâ\d]+)[.]+[a-z]{2,6})|([a-zA-Zéàèçùïöëôîêûüäâ\d]+))$/;
  $scope.regexPassword = /^([a-zA-Z1-9éèçàëïöüùâêûîôä_-]+)$/;
  $scope.regexTagDiscord = /^([a-zA-Zéèçàëïöüùâêûîôä\d-_.]+)[#][\d]{4}$/;
  $scope.regexPseudo = /^([a-zA-Zéèçàëïöüùâêûîôä\d-_.]+)$/

}]);
