<!-- <div class = 'row'>
    <div class='col-md-10'>
        <table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true" id='homeTable'>
            <tbody>
                <tr ng-repeat="entry in $data">
                    <td data-title="'Age'" data-filter="{ age: 'assets/views/ageRange.html'}" data-sortable="'age'">{{entry.age}}</td>
                    <td data-title="'Gender'" data-filter="{ sex: 'select'}" data-filter-data='genders' data-sortable="'sex'">{{entry.sex}}</td>
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
</div> -->
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="navId">
    <li class="nav-item">
        <a href="#tab1Id" class="nav-link active">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#tab2Id">Action</a>
            <a class="dropdown-item" href="#tab3Id">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#tab4Id">Action</a>
        </div>
    </li>
    <li class="nav-item">
        <a href="#tab5Id" class="nav-link">Another link</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
        <div class = 'row'>
            <div class='col-md-10'>
                <table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true" id='homeTable'>
                    <tbody>
                        <tr ng-repeat="entry in $data">
                            <td data-title="'Age'" data-filter="{ age: 'assets/views/ageRange.html'}" data-sortable="'age'">{{entry.age}}</td>
                            <td data-title="'Gender'" data-filter="{ sex: 'select'}" data-filter-data='genders' data-sortable="'sex'">{{entry.sex}}</td>
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
    </div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel">
        test
    </div>
</div>

<script>
    $('#navId a').click(e => {
        e.preventDefault();
        // $(this).tab('show');
    });
</script>