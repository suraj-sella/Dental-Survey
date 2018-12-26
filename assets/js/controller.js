'use strict';
app.controller('myCtrl', ['$scope', 'Entries', 'NgTableParams', 'GetComplaintsTab', 'GetComplaintsTotals', 'GetFindingsTab', 'GetFindingsTotals', 'Excel', '$timeout', function($scope, Entries, NgTableParams, GetComplaintsTab, GetComplaintsTotals, GetFindingsTab, GetFindingsTotals, Excel, $timeout){
    
    $scope.ranges = [{
            title: 'All' , from: 0, to: 150,
        },{
            title: '0 to 2' , from: 0, to: 2,
        },{
            title: '2 to 6' , from: 2, to: 6,
        },{
            title: '6 to 12' , from: 6, to: 12,
        },{
            title: '12 to 18' , from: 12, to: 18,
        },{
            title: '18 to 24' , from: 18, to: 24,
        },{
            title: '24 to 34' , from: 24, to: 34,
        },{
            title: '34 to 60' , from: 34, to: 60,
        },{
            title: '60 to 75' , from: 60, to: 75,
        },{
            title: '75 to 150' , from: 75, to: 150,
    }];

    $scope.selectedRange = $scope.ranges[0];
    
    $scope.matchCount = 0;
    $scope.totalCount = 0;
    $scope.genders = [
        {id: '', title: 'All'},
        {id: '!Female', title: 'Male'},
        {id: 'Female', title: 'Female'}
    ];
    $scope.matches = [
        {id: '', title: 'All'},
        {id: 'Yes', title: 'Yes'},
        {id: 'No', title: 'No'},
        {id: 'Null', title: 'Null'}
    ];

    $scope.totalFields = ($scope.ranges.length - 1) * $scope.genders.length;
    
    var entry = [];
    var flagFirstTotal = true;
    $scope.completeTotal = 0;
    $scope.populateTable = function(range){
        // Get a Entry object from the factory
        entry = Entries.query({from: range.from, to:range.to});
        entry.$promise.then(function(response){
            if(flagFirstTotal)$scope.completeTotal = response.length, flagFirstTotal = false;
            for (let key = 0; key < response.length; key++) {
                response[key].age = Number(response[key].age);
                response[key].match = 'Null';
                if($scope.checkMatch(response[key])=='true'){
                    response[key].match = 'Yes';
                }else if($scope.checkMatch(response[key])=='false'){
                    response[key].match = 'No';
                }
            }
            $scope.tableParams = new NgTableParams({
                page: 1,
                count: 10
            },{
                counts: [25, 50, 100, 250, 1010],
                dataset: response
            });
        }, function(reason){
            console.log(reason);
        });
    }

    $scope.populateTable($scope.selectedRange);

    $scope.checkMatch = function(data){
        $scope.noFindFor = [];
        if(data.comp.includes('Tooth ache')){
            if(data.find.includes('Decayed')||data.find.includes('Fractured / dislodged restoration')||data.find.includes('Fractured tooth')||data.find.includes('Needing rct')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Tooth ache');
            }
        }
        if(data.comp.includes('Tooth decay')){
            if(data.find.includes('Decayed')||data.find.includes('Fractured / dislodged restoration')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Tooth decay');
            }
        }
        if(data.comp.includes('Wants to fill decayed tooth')){
            if(data.find.includes('Decayed')||data.find.includes('Fractured / dislodged restoration')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Wants to fill decayed tooth');
            }
        }
        if(data.comp.includes('Broken filling')){
            if(data.find.includes('Fractured / dislodged restoration')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Broken filling');
            }
        }
        if(data.comp.includes('Wants to get teeth cleaned')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Wants to get teeth cleaned');
            }
        }
        if(data.comp.includes('Deposits on')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Deposits on');
            }
        }
        if(data.comp.includes('Bad breath')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Bad breath');
            }
        }
        if(data.comp.includes('Mobile teeth')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Mobile teeth');
            }
        }
        if(data.comp.includes('Swollen gums')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Swollen gums');
            }
        }
        if(data.comp.includes('Bleeding gums')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Bleeding gums');
            }
        }
        if(data.comp.includes('Pain in the gums')){
            if(data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Pain in the gums');
            }
        }
        if(data.comp.includes('Sensitivity')){
            if(data.find.includes('Attrition')||data.find.includes('Abrasion')||data.find.includes('Erosion')||data.find.includes('Decayed')||data.find.includes('Deposits')||data.find.includes('Recession')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Sensitivity');
            }
        }
        if(data.comp.includes('Wants to remove tooth')){
            if(data.find.includes('Root stumps')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Sensitivity');
            }
        }
        if(data.comp.includes('Wants to replace missing teeth')){
            if(data.find.includes('Missing teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Wants to replace missing teeth');
            }
        }
        if(data.comp.includes('Wants orthodontic treatment')){
            if(data.find.includes('Malocclusions')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Wants orthodontic treatment');
            }
        }
        if(data.comp.includes('Forwardly placed teeth')){
            if(data.find.includes('Malocclusions')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Forwardly placed teeth');
            }
        }
        if(data.comp.includes('Gap between teeth')){
            if(data.find.includes('Malocclusions')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Gap between teeth');
            }
        }
        if(data.comp.includes('Irregularly placed teeth')){
            if(data.find.includes('Malocclusions')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Irregularly placed teeth');
            }
        }
        if(data.comp.includes('Unerupted teeth')){
            if(data.find.includes('Impacted teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Unerupted teeth');
            }
        }
        if(data.comp.includes('Food Lodgement')){
            if(data.find.includes('Decayed')||data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Halitosis')||data.find.includes('Swollen gums')||data.find.includes('Recession')||data.find.includes('Mobile teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Food Lodgement');
            }
        }
        if(data.comp.includes('Complaints about jaw')){
            if(data.find.includes('Myalgia')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Complaints about jaw');
            }
        }
        if(data.comp.includes('Broken tooth')){
            if(data.find.includes('Fractured tooth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Broken tooth');
            }
        }
        if(data.comp.includes('Reduced mouth opening')){
            if(data.find.includes('OSMF')||data.find.includes('Reduced mouth opening')||data.find.includes('Pericoronitis')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Reduced mouth opening');
            }
        }
        if(data.comp.includes('Burning sensation')){
            if(data.find.includes('OSMF')||data.find.includes('Reduced mouth opening')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Burning sensation');
            }
        }
        if(data.comp.includes('Growth in or around oral cavity')){
            if(data.find.includes('OSMF with malignant transformation')||data.find.includes('Suspected malignancy')||data.find.includes('Carcinoma')||data.find.includes('Reduced mouth opening')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Growth in or around oral cavity');
            }
        }
        if(data.comp.includes('Ulcer')){
            if(data.find.includes('Ulcer')||data.find.includes('Ulceroproliferative growth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Ulcer');
            }
        }
        if(data.comp.includes('Discolored')){
            if(data.find.includes('Discolored')||data.find.includes('Stains')||data.find.includes('Deposits')||data.find.includes('Fluorosis')||data.find.includes('Enamel hypoplasia')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Discolored');
            }
        }
        if(data.comp.includes('Pus discharge')){
            if(data.find.includes('Pus discharge')||data.find.includes('Sinus opening')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Pus discharge');
            }
        }
        if(data.comp.includes('Swelling of facial region')){
            if(data.find.includes('Facial swelling')||data.find.includes('Swelling over cheek')||data.find.includes('Swelling of face')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Swelling of facial region');
            }
        }
        if($scope.noFindFor.length>0){
            return 'false';
        }
    }

    $scope.totalPercentage = function(x){
        let y = $scope.completeTotal;
        let z = x/y * 100;
        return z.toFixed(2);
    }

    $scope.complaintsData = {};
    $scope.totalComplaintsData = {};
    $scope.complaintsData = GetComplaintsTab.query();
    $scope.complaintsData.$promise.then(function(response){
        $scope.complaintsData = response;
        // console.log(response);
    });
    $scope.godComplaintsTotal = 0;
    $scope.totalComplaintsData = GetComplaintsTotals.get();
    $scope.totalComplaintsData.$promise.then(function(response){
        $scope.totalComplaintsData = response;
        for (var property in $scope.totalComplaintsData) {
            if ($scope.totalComplaintsData.hasOwnProperty(property)) {
                if($scope.totalComplaintsData[property].all!=undefined){
                    $scope.godComplaintsTotal += $scope.totalComplaintsData[property].all;
                }
            }
        }
    });

    //Findings Section
    $scope.findingsData = {};
    $scope.totalData = {};
    $scope.findingsData = GetFindingsTab.query();
    $scope.findingsData.$promise.then(function(response){
        $scope.findingsData = response;
    });
    $scope.godFindingsTotal = 0;
    $scope.totalFindingsData = GetFindingsTotals.get();
    $scope.totalFindingsData.$promise.then(function(response){
        $scope.totalFindingsData = response;
        for (var property in $scope.totalFindingsData) {
            if ($scope.totalFindingsData.hasOwnProperty(property)) {
                if($scope.totalFindingsData[property].all!=undefined){
                    $scope.godFindingsTotal += $scope.totalFindingsData[property].all;
                }
            }
        }
    });

    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            // location.href=exportHref;
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            var link = document.createElement("a");
            link.download = downloadName + ".xls";
            link.href = exportHref;
            link.click();
        },100);
    }

}]);