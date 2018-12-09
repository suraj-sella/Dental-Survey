app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
      templateUrl : "/Dental-Survey/assets/views/home.php"
    })
    .when("/complaints", {
      templateUrl : "/Dental-Survey/assets/views/complaints.php"
    })
    .when("/findings", {
      templateUrl : "/Dental-Survey/assets/views/findings.php"
    });
  });