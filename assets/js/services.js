app.factory('Entries', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/entries/:from/:to/:gender');
}]);

app.factory('GetAgeRange', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/getAgeRange/:id', {}, {
        put: {
            method: 'PUT'
        }
    });
}]);

app.factory('GetGenders', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/getGenders/');
}]);

app.factory('GetMatches', ['$resource', function($resource) {
    return $resource('http://localhost/Dental-Survey/index.php/api/survey_data/getMatches/');
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

app.factory('Excel', ['$window', function($window) {
    var uri='data:application/vnd.ms-excel;base64,',
        template=`'
            <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
                <head>
                    <!--[if gte mso 9]>
                        <xml>
                            <x:ExcelWorkbook>
                                <x:ExcelWorksheets>
                                    <x:ExcelWorksheet>
                                        <x:Name>
                                            {worksheet}
                                        </x:Name>
                                        <x:WorksheetOptions>
                                            <x:DisplayGridlines/>
                                        </x:WorksheetOptions>
                                    </x:ExcelWorksheet>
                                </x:ExcelWorksheets>
                            </x:ExcelWorkbook>
                        </xml>
                    <![endif]-->
                </head><body><table>{table}</table></body>
            </html>'`,
        base64=function(s){
            return $window.btoa(unescape(encodeURIComponent(s)));
        },
        format=function(s,c){
            return s.replace(/{(\w+)}/g,
                function(m,p){
                    return c[p];
                }
            )
        };
    return {
        tableToExcel:function(tableId,worksheetName){
            var table = angular.element( document.querySelector( tableId ) );
            if(tableId=='#homeTable'){
                var hometable = table.clone(true);
                hometable.find('tr')[1].remove();
                var ctx={
                    worksheet:worksheetName,
                    table:hometable.html()
                };
            }if(tableId=='#agerangesTable'){
                var agerangestable = table.clone(true);
                agerangestable.find('tr')[1].remove();
                agerangestable.find("tr").each(function(){
                    $(this).find("th:eq(4)").remove();
                    $(this).find("td:eq(4)").remove();
                });
                var ctx={
                    worksheet:worksheetName,
                    table:agerangestable.html()
                };
            }else if((tableId=='#compTable')||(tableId=='#findTable')){
                var comptable = table.clone(true);
                $(comptable).find('#exportBtn').remove();
                for (const row of comptable.find('tbody')[0].rows) {
                    var tds = $(row).children('td').length;
                    for(let i = 1; i<tds; i=i+3){
                        let cell = $(row).find('td:eq(' + i + ')');
                        $(cell).attr('bgcolor', 'lightgreen');
                    }
                }
                var ctx={
                    worksheet:worksheetName,
                    table:comptable.html()
                };
            }else{
                var ctx={
                    worksheet:worksheetName,
                    table:table.html()
                };
            }
            var href=uri+base64(format(template,ctx));
            return href;
        }
    };    
}]);