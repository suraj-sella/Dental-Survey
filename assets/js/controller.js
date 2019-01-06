'use strict';
app.controller('homeCtrl', ['$scope', 'Entries', 'NgTableParams', 'Excel', '$timeout', '$q', 'GetAgeRange', 'GetGenders', 'GetMatches', function($scope, Entries, NgTableParams, Excel, $timeout, $q, GetAgeRange, GetGenders, GetMatches){
    
    $scope.ranges = [];
    $scope.genders = [];
    $scope.matches = [];
    $scope.matchCount = 0;
    $scope.totalCount = 0;
    var entry = [];
    var flagFirstTotal = true;
    $scope.completeTotal = 0;
    $scope.selectedRange = [];
    $scope.selectedGender = [];
    
    $q.all([
        //AGE-RANGE
        $scope.agerange = GetAgeRange.query(),
        $scope.agerange.$promise.then(function(response){
            $scope.ranges = response;
        }),
        //GENDER-DATA
        $scope.genderdata = GetGenders.query(),
        $scope.genderdata.$promise.then(function(response){
            $scope.genders = response;
        }),
        //MATCHES-DATA
        $scope.match = GetMatches.query(),
        $scope.match.$promise.then(function(response){
            // $scope.matches = response;
        })
    ]).then(function(response){
        $scope.selectedRange = $scope.ranges[0];
        $scope.selectedGender = $scope.genders[0];
        $scope.populateTable($scope.selectedRange, $scope.selectedGender);
    });
    
    $scope.matches = [
        {id: '', title: 'All'},
        {id: 'Yes', title: 'Yes'},
        {id: 'No', title: 'No'},
        {id: 'Null', title: 'Null'}
    ];
    
    $scope.populateTable = function(range, gender){
        $scope.selectedRange = range;
        $scope.selectedGender = gender;
        // Get a Entry object from the factory
        entry = Entries.query({from: range.from, to: range.to, gender: gender.value});
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
            if(reason.status=404){
                console.log(reason);
                $scope.tableParams = new NgTableParams({
                    page: 1,
                    count: 10
                },{
                    counts: [25, 50, 100, 250, 1010],
                    dataset: reason.data.response
                });
            }
        });
    }

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
        if(data.comp.includes('Redness of gums')){
            if(data.find.includes('Oral lichen planus')||data.find.includes('Desquamative gingivitis')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Redness of gums');
            }
        }
        if(data.comp.includes('receeded gums')||data.comp.includes('Receding gums')){
            if(data.find.includes('Recession')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('receeded gums/ Receding gums');
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
        if(data.comp.includes('Complaints about denture')){
            if(data.find.includes('Missing teeth')||data.find.includes('Denture stomatitis')||data.find.includes('Denture stomatitis')||data.find.includes('reddish areas wrt denture bearing areas')||data.find.includes('Broken maxillary denture')||data.find.includes('Resorted ridges')||data.find.includes('Fractured mandibular denture')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Complaints about denture');
            }
        }
        if(data.comp.includes('Sharp tooth')){
            if(data.find.includes('Pericoronitis')||data.find.includes('Frictional keratosis')||data.find.includes('Sharp cusp')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Sharp tooth');
            }
        }
        if(data.comp.includes('Reduced mouth opening')||data.comp.includes('Limited mouth opening')){
            if(data.find.includes('OSMF')||data.find.includes('Reduced mouth opening')||data.find.includes('Pericoronitis')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Reduced mouth opening/ Limited mouth opening');
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
            if(data.find.includes('Space infection')||data.find.includes('Swelling over cheek')||data.find.includes('Swelling of face')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Swelling of facial region');
            }
        }
        if(data.comp.includes('Injury to right cheek due to braces')){
            if(data.find.includes('Traumatic Ulcer on buccal mucosa due to arch wire')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Injury to right cheek due to braces');
            }
        }
        if(data.comp.includes('Retained tooth')){
            if(data.find.includes('Overretained deciduous c')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Retained tooth');
            }
        }
        if(data.comp.includes('Incomplete rct')){
            if(data.find.includes('Needing rct')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Incomplete rct');
            }
        }
        if(data.comp.includes('Requires crown in rct treated tooth')){
            if(data.find.includes('Needing rct')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Requires crown in rct treated tooth');
            }
        }
        if(data.comp.includes('Diplopia on looking down')){
            if(data.find.includes('Displaced fracture floor of orbit with herniation of contents into maxillary sinus')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Diplopia on looking down');
            }
        }
        if(data.comp.includes('Teeth erupted three days after birth')){
            if(data.find.includes('Neonatal mandibular anterior teeth')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Teeth erupted three days after birth');
            }
        }
        if(data.comp.includes('Drooling of saliva')){
            if(data.find.includes('Known case of neuromuscular deficit')||data.find.includes('sialorrhea due to inability to swallow')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Drooling of saliva');
            }
        }
        if(data.comp.includes('Requires crown in rct treated tooth')){
            if(data.find.includes('Tooth preparation done wrt 24,25,26')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Requires crown in rct treated tooth');
            }
        }
        if(data.comp.includes('Pain in soft tissues of face')){
            if(data.find.includes('Reduced mouth opening')||data.find.includes('Facial myalgia')||data.find.includes('Masticatory muscle myalgia')||data.find.includes('Ulceroproliferative growth')||data.find.includes('Suspected malignancy')||data.find.includes('Carcinoma')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Pain in soft tissues of face');
            }
        }
        if(data.comp.includes('Pain in soft tissues of oral cavity')){
            if(data.find.includes('Contact lichenoid reaction wrt left buccal mucosa. Homogeneous leukoplakia wrt left lower alveolar and vestibular mucosa')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Pain in soft tissues of oral cavity');
            }
        }
        if(data.comp.includes('Itching sensation on left side of face post extraction')){
            if(data.find.includes('Healing socket wrt 36')||data.find.includes('paraesthesia secondary to traumatic extraction')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Itching sensation on left side of face post extraction');
            }
        }
        if(data.comp.includes('Worn away teeth')){
            if(data.find.includes('Fractured tooth')||data.find.includes('Abrasion')){
                $scope.matchCount++;
                return 'true';
            }
            else{
                $scope.noFindFor.push('Worn away teeth');
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

    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            var link = document.createElement("a");
            link.download = downloadName + ".xls";
            link.href = exportHref;
            link.click();
        },100);
    }

}]);

app.controller('compCtrl', ['$scope', 'GetComplaintsTab', 'GetComplaintsTotals', 'Excel', '$timeout', 'GetAgeRange', 'GetGenders', '$q', function($scope, GetComplaintsTab, GetComplaintsTotals, Excel, $timeout, GetAgeRange, GetGenders, $q){
    
    $scope.ranges = [];
    $scope.genders = [];
    
    $q.all([
        //AGE-RANGE
        $scope.agerange = GetAgeRange.query(),
        $scope.agerange.$promise.then(function(response){
            $scope.ranges = response;
        }),
        //GENDER-DATA
        $scope.gender = GetGenders.query(),
        $scope.gender.$promise.then(function(response){
            $scope.genders = response;
        })
    ]).then(function(response){
        $scope.totalFields = ($scope.ranges.length - 1) * $scope.genders.length;
    });
    
    //COMPLAINTS
    $scope.complaintsData = {};
    $scope.totalComplaintsData = {};
    //Getting Complaints
    $scope.complaintsData = GetComplaintsTab.query();
    $scope.complaintsData.$promise.then(function(response){
        $scope.complaintsData = response;
    });
    //Getting Totals
    $scope.godComplaintsTotal = 0;
    $scope.totalComplaintsData = GetComplaintsTotals.get();
    $scope.totalComplaintsData.$promise.then(function(response){
        $scope.totalComplaintsData = response;
        //Calculating Totals
        for (var property in $scope.totalComplaintsData) {
            if ($scope.totalComplaintsData.hasOwnProperty(property)) {
                if($scope.totalComplaintsData[property].all!=undefined){
                    $scope.godComplaintsTotal += $scope.totalComplaintsData[property].all;
                }
            }
        }
    });
    
    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            var link = document.createElement("a");
            link.download = downloadName + ".xls";
            link.href = exportHref;
            link.click();
        },100);
    }

    //STICKY THEAD
    // var off = $('thead.headsection').offset();
    // $(window).scroll(function (event) {
    //     var scroll = $(window).scrollTop();
    //     if(scroll > off.top){
            
    //     }
    // });

}]);

app.controller('findCtrl', ['$scope', 'GetFindingsTab', 'GetFindingsTotals', 'Excel', '$timeout', 'GetAgeRange', 'GetGenders', '$q', function($scope, GetFindingsTab, GetFindingsTotals, Excel, $timeout, GetAgeRange, GetGenders, $q){
    
    $scope.ranges = [];
    $scope.genders = [];
    
    $q.all([
        //AGE-RANGE
        $scope.agerange = GetAgeRange.query(),
        $scope.agerange.$promise.then(function(response){
            $scope.ranges = response;
        }),
        //GENDER-DATA
        $scope.gender = GetGenders.query(),
        $scope.gender.$promise.then(function(response){
            $scope.genders = response;
        })
    ]).then(function(response){
        $scope.totalFields = ($scope.ranges.length - 1) * $scope.genders.length;
        //FINDINGS
        $scope.findingsData = {};
        $scope.totalFindingssData = {};
        //Getting Findings
        $scope.findingsData = GetFindingsTab.query();
        $scope.findingsData.$promise.then(function(response){
            $scope.findingsData = response;
        });
        //Getting Totals
        $scope.godFindingsTotal = 0;
        $scope.totalFindingsData = GetFindingsTotals.get();
        $scope.totalFindingsData.$promise.then(function(response){
            $scope.totalFindingsData = response;
            //Calculating Totals
            for (var property in $scope.totalFindingsData) {
                if ($scope.totalFindingsData.hasOwnProperty(property)) {
                    if($scope.totalFindingsData[property].all!=undefined){
                        $scope.godFindingsTotal += $scope.totalFindingsData[property].all;
                    }
                }
            }
        });
    });

    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            var link = document.createElement("a");
            link.download = downloadName + ".xls";
            link.href = exportHref;
            link.click();
        },100);
    }

}]);

app.controller('agerangesCtrl', ['$scope', 'GetAgeRange', '$q', 'NgTableParams', 'Excel', '$timeout', function($scope, GetAgeRange, $q, NgTableParams, Excel, $timeout){
    
    $scope.ranges = [];
    $scope.populateTable=function(){
        $q.all([
            //AGE-RANGE
            $scope.agerange = GetAgeRange.query(),
            $scope.agerange.$promise.then(function(response){
                for (let key = 0; key < response.length; key++) {
                    response[key].id = Number(response[key].id);
                    response[key].from = Number(response[key].from);
                    response[key].to = Number(response[key].to);
                }
                $scope.ranges = response;
            }),
        ]).then(function(response){
            $scope.tableParams = new NgTableParams({
                page: 1,
                count: 10
            },{
                counts: [],
                dataset: $scope.ranges
            });
            $scope.newRow.id = $scope.tableParams.total() + 1;
        });
    }
    
    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            if (downloadName != null) {
                var link = document.createElement("a");
                link.download = downloadName + ".xls";
                link.href = exportHref;
                link.click();
            }
        },100);
    }

    $scope.editShow = false;      
    $scope.editRow = [];      
    $scope.newRow = [];      
    
    $scope.editAgeRange = function (entry) {
        $scope.editShow = true;      
        $scope.editRow = entry;
    }
    
    $scope.updateAgeRange = function (entry) {
        $scope.agerange = GetAgeRange.put(entry),
        $scope.agerange.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.editRow = [];    
                alert('Updated Successfully!');
            }else{
                console.log(response);
            }
            $scope.editShow = false;    
        }, function(error) {
            console.log(error);
        });
    }

    $scope.deleteAgeRange = function (entry) {
        $scope.agerange = GetAgeRange.delete({id: entry.id}),
        $scope.agerange.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                alert('Deleted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.insertAgeRange = function (entry) {
        $scope.agerange = GetAgeRange.save({
            id: entry.id,
            title: entry.title,
            from: entry.from,
            to: entry.to
        }),
        $scope.agerange.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.newRow = [];    
                alert('Inserted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.populateTable();

}]);

app.controller('gendersCtrl', ['$scope', 'GetGenders', '$q', 'NgTableParams', 'Excel', '$timeout', function($scope, GetGenders, $q, NgTableParams, Excel, $timeout){
    
    $scope.genders = [];
    $scope.populateTable=function(){
        $q.all([
            //AGE-RANGE
            $scope.gender = GetGenders.query(),
            $scope.gender.$promise.then(function(response){
                for (let key = 0; key < response.length; key++) {
                    response[key].id = Number(response[key].id);
                }
                $scope.genders = response;
            }),
        ]).then(function(response){
            $scope.tableParams = new NgTableParams({
                page: 1,
                count: 10
            },{
                counts: [],
                dataset: $scope.genders
            });
            $scope.newRow.id = $scope.tableParams.total() + 1;
        });
    }
    
    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            if (downloadName != null) {
                var link = document.createElement("a");
                link.download = downloadName + ".xls";
                link.href = exportHref;
                link.click();
            }
        },100);
    }

    $scope.editShow = false;      
    $scope.editRow = [];      
    $scope.newRow = [];      
    
    $scope.editGender = function (entry) {
        $scope.editShow = true;      
        $scope.editRow = entry;
    }
    
    $scope.updateGender = function (entry) {
        $scope.gender = GetGenders.put(entry),
        $scope.gender.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.editRow = [];    
                alert('Updated Successfully!');
            }else{
                console.log(response);
            }
            $scope.editShow = false;    
        }, function(error) {
            console.log(error);
        });
    }

    $scope.deleteGender = function (entry) {
        $scope.gender = GetGenders.delete({id: entry.id}),
        $scope.gender.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                alert('Deleted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.insertGender = function (entry) {
        $scope.gender = GetGenders.save({
            id: entry.id,
            title: entry.title,
            value: entry.value
        }),
        $scope.gender.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.newRow = [];    
                alert('Inserted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.populateTable();

}]);

app.controller('matchesCtrl', ['$scope', 'GetMatches', '$q', 'NgTableParams', 'Excel', '$timeout', function($scope, GetMatches, $q, NgTableParams, Excel, $timeout){
    
    $scope.matches = [];
    $scope.populateTable=function(){
        $q.all([
            //AGE-RANGE
            $scope.match = GetMatches.query(),
            $scope.match.$promise.then(function(response){
                for (let key = 0; key < response.length; key++) {
                    response[key].id = Number(response[key].id);
                }
                $scope.matches = response;
            }),
        ]).then(function(response){
            $scope.tableParams = new NgTableParams({
                page: 1,
                count: 10
            },{
                counts: [],
                dataset: $scope.matches
            });
            $scope.newRow.id = $scope.tableParams.total() + 1;
        });
    }
    
    //EXPORT MODULE
    $scope.exportToExcel=function(tableId){
        var exportHref=Excel.tableToExcel(tableId,'Survey Data');
        $timeout(function(){
            var downloadName = prompt("What Would You Name The File?", "AnalysisData");
            if (downloadName != null) {
                var link = document.createElement("a");
                link.download = downloadName + ".xls";
                link.href = exportHref;
                link.click();
            }
        },100);
    }

    $scope.editShow = false;      
    $scope.editRow = [];      
    $scope.newRow = [];      
    
    $scope.editMatch = function (entry) {
        $scope.editShow = true;      
        $scope.editRow = entry;
    }
    
    $scope.updateMatch = function (entry) {
        $scope.match = GetMatches.put(entry),
        $scope.match.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.editRow = [];    
                alert('Updated Successfully!');
            }else{
                console.log(response);
            }
            $scope.editShow = false;    
        }, function(error) {
            console.log(error);
        });
    }

    $scope.deleteMatch = function (entry) {
        $scope.match = GetMatches.delete({id: entry.id}),
        $scope.match.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                alert('Deleted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.insertMatch = function (entry) {
        $scope.match = GetMatches.save({
            id: entry.id,
            title: entry.title,
            value: entry.value
        }),
        $scope.match.$promise.then(function(response){
            if(response.response){
                $scope.populateTable();
                $scope.newRow = [];    
                alert('Inserted Successfully!');
            }else{
                console.log(response);
            }
        }, function(error) {
            console.log(error);
        });
    }

    $scope.populateTable();

}]);