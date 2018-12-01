app.factory('Entries', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/entries/:from/:to');
}]);