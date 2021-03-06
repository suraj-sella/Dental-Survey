<div class = 'row'>
    <div class='col-md-10'>
        <table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true" id='homeTable'>
            <tbody>
                <tr ng-repeat="entry in $data">
                    <td data-title="'Age'" data-filter="{ age: 'assets/views/ageRange.html'}" data-sortable="'age'">{{entry.age}}</td>
                    <td data-title="'Gender'" data-filter="{ sex: 'assets/views/gendersData.html'}" data-sortable="'sex'">{{entry.sex}}</td>
                    <td data-title="'Complaints'" data-filter="{ comp: 'text'}" data-sortable="'comp'">{{entry.comp}}</td>
                    <td data-title="'Findings'" data-filter="{ find: 'text'}" data-sortable="'find'">{{entry.find}}</td>
                    <td data-title="'Match'" data-filter="{ match: 'select'}" data-filter-data='matches' data-sortable="'match'">{{entry.match}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class='col-md-2'>
        <table class="table text-center table-bordered headsection" ng-table>
            <tbody>
                <td data-title="'Total'">{{tableParams.total()}}</td>
                <td data-title="'Percentage'">{{totalPercentage(tableParams.total())}} %</td>
            </tbody>
        </table>
        <button class="btn btn-primary" ng-click="exportToExcel('#homeTable')">Export Data To Excel</button>
    </div>
</div>