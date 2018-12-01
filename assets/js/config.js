app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
      templateUrl : "/Dental-Survey/assets/views/home.php"
    })
    .when("/tabulation", {
      templateUrl : "/Dental-Survey/assets/views/tabulation.php"
    })
    .when("/green", {
      templateUrl : "green.htm"
    })
    .when("/blue", {
      templateUrl : "blue.htm"
    });
  });