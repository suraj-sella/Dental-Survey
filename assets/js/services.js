app.factory('Entries', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/entries/:from/:to');
}]);

app.factory('GetComplaintsTab', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/compTab/');
}]);

app.factory('GetComplaintsTotals', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/getCompTotals/');
}]);

app.factory('GetFindingsTab', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/findTab/');
}]);

app.factory('GetFindingsTotals', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/getFindTotals/');
}]);