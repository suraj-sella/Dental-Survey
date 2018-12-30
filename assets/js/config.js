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
    }).when("/ageranges", {
      controller: 'agerangesCtrl',
      templateUrl : "/Dental-Survey/assets/views/ageranges.php"
    }).when("/genders", {
      controller: 'gendersCtrl',
      templateUrl : "/Dental-Survey/assets/views/genders.php"
    }).when("/matches", {
      controller: 'matchesCtrl',
      templateUrl : "/Dental-Survey/assets/views/matches.php"
    }).when("/complaintsmaster", {
      controller: 'complaintsmasterCtrl',
      templateUrl : "/Dental-Survey/assets/views/complaintsmaster.php"
    }).when("/findingsmaster", {
      controller: 'findingsmasterCtrl',
      templateUrl : "/Dental-Survey/assets/views/findingsmaster.php"
    }).when("/scoringchart", {
      controller: 'scoringchartCtrl',
      templateUrl : "/Dental-Survey/assets/views/scoringchart.php"
    }).otherwise({
      controller: 'homeCtrl',
      templateUrl : "/Dental-Survey/assets/views/home.php"
    });
  });