app.config(function($routeProvider) {
    $routeProvider.when("/", {
      controller: 'homeCtrl',
      templateUrl : "/Dental-Survey/assets/views/home.php"
    }).when("/complaints", {
      controller: 'compCtrl',
      templateUrl : "/Dental-Survey/assets/views/complaints.php"
    }).when("/findings", {
      controller: 'findCtrl',
      templateUrl : "/Dental-Survey/assets/views/findings.php"
    }).when("/masters", {
      controller: 'mastersCtrl',
      templateUrl : "/Dental-Survey/assets/views/masters.php"
    }).otherwise({
      controller: 'homeCtrl',
      templateUrl : "/Dental-Survey/assets/views/home.php"
    });
  });