<div class='row'>
    <div class='col-md-12'>
        <table class="table table-striped text-center table-bordered table-responsive">
            <thead class='thead headsection'>
                <tr>
                    <th class='emptycell'> <i class="fas fa-arrow-down"></i> Complaints <i class="fas fa-arrow-down"></i> </th>
                    <th colspan='27'> <i class="fas fa-arrow-down"></i> Age Groups <i class="fas fa-arrow-down"></i> </th>
                    <th class='emptycell'></th>
                </tr>
                <tr>
                    <th class='emptycell'></th>
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
                <tr ng-repeat='data in complaintsData'>
                    <td>{{ complaintsData[$index].complaint }}</td>
                    <td>{{ complaintsData[$index]['0-2'].all }}</td>
                    <td>{{ complaintsData[$index]['0-2'].male }}</td>
                    <td>{{ complaintsData[$index]['0-2'].female }}</td>
                    <td>{{ complaintsData[$index]['2-6'].all }}</td>
                    <td>{{ complaintsData[$index]['2-6'].male }}</td>
                    <td>{{ complaintsData[$index]['2-6'].female }}</td>
                    <td>{{ complaintsData[$index]['6-12'].all }}</td>
                    <td>{{ complaintsData[$index]['6-12'].male }}</td>
                    <td>{{ complaintsData[$index]['6-12'].female }}</td>
                    <td>{{ complaintsData[$index]['12-18'].all }}</td>
                    <td>{{ complaintsData[$index]['12-18'].male }}</td>
                    <td>{{ complaintsData[$index]['12-18'].female }}</td>
                    <td>{{ complaintsData[$index]['18-24'].all }}</td>
                    <td>{{ complaintsData[$index]['18-24'].male }}</td>
                    <td>{{ complaintsData[$index]['18-24'].female }}</td>
                    <td>{{ complaintsData[$index]['24-34'].all }}</td>
                    <td>{{ complaintsData[$index]['24-34'].male }}</td>
                    <td>{{ complaintsData[$index]['24-34'].female }}</td>
                    <td>{{ complaintsData[$index]['34-60'].all }}</td>
                    <td>{{ complaintsData[$index]['34-60'].male }}</td>
                    <td>{{ complaintsData[$index]['34-60'].female }}</td>
                    <td>{{ complaintsData[$index]['60-75'].all }}</td>
                    <td>{{ complaintsData[$index]['60-75'].male }}</td>
                    <td>{{ complaintsData[$index]['60-75'].female }}</td>
                    <td>{{ complaintsData[$index]['75-150'].all }}</td>
                    <td>{{ complaintsData[$index]['75-150'].male }}</td>
                    <td>{{ complaintsData[$index]['75-150'].female }}</td>
                    <td>{{ complaintsData[$index]['total'] }}</td>
                </tr>
            </tbody>
            <tfoot class='tfoot'>
                <tr>
                    <th class='headsection'>TOTAL</th>
                    <th>{{ totalComplaintsData['0-2'].all }}</th>
                    <th>{{ totalComplaintsData['0-2'].male }}</th>
                    <th>{{ totalComplaintsData['0-2'].female }}</th>
                    <th>{{ totalComplaintsData['2-6'].all }}</th>
                    <th>{{ totalComplaintsData['2-6'].male }}</th>
                    <th>{{ totalComplaintsData['2-6'].female }}</th>
                    <th>{{ totalComplaintsData['6-12'].all }}</th>
                    <th>{{ totalComplaintsData['6-12'].male }}</th>
                    <th>{{ totalComplaintsData['6-12'].female }}</th>
                    <th>{{ totalComplaintsData['12-18'].all }}</th>
                    <th>{{ totalComplaintsData['12-18'].male }}</th>
                    <th>{{ totalComplaintsData['12-18'].female }}</th>
                    <th>{{ totalComplaintsData['18-24'].all }}</th>
                    <th>{{ totalComplaintsData['18-24'].male }}</th>
                    <th>{{ totalComplaintsData['18-24'].female }}</th>
                    <th>{{ totalComplaintsData['24-34'].all }}</th>
                    <th>{{ totalComplaintsData['24-34'].male }}</th>
                    <th>{{ totalComplaintsData['24-34'].female }}</th>
                    <th>{{ totalComplaintsData['34-60'].all }}</th>
                    <th>{{ totalComplaintsData['34-60'].male }}</th>
                    <th>{{ totalComplaintsData['34-60'].female }}</th>
                    <th>{{ totalComplaintsData['60-75'].all }}</th>
                    <th>{{ totalComplaintsData['60-75'].male }}</th>
                    <th>{{ totalComplaintsData['60-75'].female }}</th>
                    <th>{{ totalComplaintsData['75-150'].all }}</th>
                    <th>{{ totalComplaintsData['75-150'].male }}</th>
                    <th>{{ totalComplaintsData['75-150'].female }}</th>
                    <th>{{ godComplaintsTotal }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>