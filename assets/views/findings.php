<div class='row'>
    <div class='col-md-12'>
        <table class="table table-striped text-center table-bordered table-responsive" id='findTable'>
            <thead class='thead headsection'>
                <tr>
                    <th class='emptycell'> <i class="fas fa-arrow-down"></i> Findings <i class="fas fa-arrow-down"></i> </th>
                    <th colspan='27'> <i class="fas fa-arrow-down"></i> Age Groups <i class="fas fa-arrow-down"></i> </th>
                    <th class='emptycell'></th>
                </tr>
                <tr>
                    <th class='emptycell'>
                        <button class="btn btn-light" ng-click="exportToExcel('#findTable')" id='exportBtn'>Export</button>
                    </th>
                    <th colspan='3' ng-repeat='range in ranges' ng-if='$index > 0'>{{ range.title }}</th>
                    <th class='emptycell'> <i class="fas fa-arrow-down"></i> Total <i class="fas fa-arrow-down"></i> </th>
                </tr>
                <tr>
                    <th> <i class="fas fa-arrow-right"></i> Genders <i class="fas fa-arrow-right"></i> </th>
                    <th ng-repeat="x in [].constructor(totalFields) track by $index">{{ genders[$index%3].title | limitTo : 1 }}</th>
                    <th class='emptycell'></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='data in findingsData'>
                    <td>{{ findingsData[$index].finding }}</td>
                    <td>{{ findingsData[$index]['0 to 2'].all }}</td>
                    <td>{{ findingsData[$index]['0 to 2'].male }}</td>
                    <td>{{ findingsData[$index]['0 to 2'].female }}</td>
                    <td>{{ findingsData[$index]['2 to 6'].all }}</td>
                    <td>{{ findingsData[$index]['2 to 6'].male }}</td>
                    <td>{{ findingsData[$index]['2 to 6'].female }}</td>
                    <td>{{ findingsData[$index]['6 to 12'].all }}</td>
                    <td>{{ findingsData[$index]['6 to 12'].male }}</td>
                    <td>{{ findingsData[$index]['6 to 12'].female }}</td>
                    <td>{{ findingsData[$index]['12 to 18'].all }}</td>
                    <td>{{ findingsData[$index]['12 to 18'].male }}</td>
                    <td>{{ findingsData[$index]['12 to 18'].female }}</td>
                    <td>{{ findingsData[$index]['18 to 24'].all }}</td>
                    <td>{{ findingsData[$index]['18 to 24'].male }}</td>
                    <td>{{ findingsData[$index]['18 to 24'].female }}</td>
                    <td>{{ findingsData[$index]['24 to 34'].all }}</td>
                    <td>{{ findingsData[$index]['24 to 34'].male }}</td>
                    <td>{{ findingsData[$index]['24 to 34'].female }}</td>
                    <td>{{ findingsData[$index]['34 to 60'].all }}</td>
                    <td>{{ findingsData[$index]['34 to 60'].male }}</td>
                    <td>{{ findingsData[$index]['34 to 60'].female }}</td>
                    <td>{{ findingsData[$index]['60 to 75'].all }}</td>
                    <td>{{ findingsData[$index]['60 to 75'].male }}</td>
                    <td>{{ findingsData[$index]['60 to 75'].female }}</td>
                    <td>{{ findingsData[$index]['75+'].all }}</td>
                    <td>{{ findingsData[$index]['75+'].male }}</td>
                    <td>{{ findingsData[$index]['75+'].female }}</td>
                    <td>{{ findingsData[$index]['total'] }}</td>
                </tr>
            </tbody>
            <tfoot class='tfoot'>
                <tr>
                    <th class='headsection'>TOTAL</th>
                    <th>{{ totalFindingsData['0 to 2'].all }}</th>
                    <th>{{ totalFindingsData['0 to 2'].male }}</th>
                    <th>{{ totalFindingsData['0 to 2'].female }}</th>
                    <th>{{ totalFindingsData['2 to 6'].all }}</th>
                    <th>{{ totalFindingsData['2 to 6'].male }}</th>
                    <th>{{ totalFindingsData['2 to 6'].female }}</th>
                    <th>{{ totalFindingsData['6 to 12'].all }}</th>
                    <th>{{ totalFindingsData['6 to 12'].male }}</th>
                    <th>{{ totalFindingsData['6 to 12'].female }}</th>
                    <th>{{ totalFindingsData['12 to 18'].all }}</th>
                    <th>{{ totalFindingsData['12 to 18'].male }}</th>
                    <th>{{ totalFindingsData['12 to 18'].female }}</th>
                    <th>{{ totalFindingsData['18 to 24'].all }}</th>
                    <th>{{ totalFindingsData['18 to 24'].male }}</th>
                    <th>{{ totalFindingsData['18 to 24'].female }}</th>
                    <th>{{ totalFindingsData['24 to 34'].all }}</th>
                    <th>{{ totalFindingsData['24 to 34'].male }}</th>
                    <th>{{ totalFindingsData['24 to 34'].female }}</th>
                    <th>{{ totalFindingsData['34 to 60'].all }}</th>
                    <th>{{ totalFindingsData['34 to 60'].male }}</th>
                    <th>{{ totalFindingsData['34 to 60'].female }}</th>
                    <th>{{ totalFindingsData['60 to 75'].all }}</th>
                    <th>{{ totalFindingsData['60 to 75'].male }}</th>
                    <th>{{ totalFindingsData['60 to 75'].female }}</th>
                    <th>{{ totalFindingsData['75+'].all }}</th>
                    <th>{{ totalFindingsData['75+'].male }}</th>
                    <th>{{ totalFindingsData['75+'].female }}</th>
                    <th>{{ godFindingsTotal }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>