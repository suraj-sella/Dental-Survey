<div class = 'row'>
    <div class='col-md-6'>
        <table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true" id='agerangesTable'>
            <tbody>
                <tr ng-repeat="agerange in $data">
                    <td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{agerange.id}}</td>
                    <td data-title="'Title'" data-filter="{ title: 'text'}" data-sortable="'title'">{{agerange.title}}</td>
                    <td data-title="'From'" data-filter="{ from: 'number'}" data-sortable="'from'">{{agerange.from}}</td>
                    <td data-title="'To'" data-filter="{ to: 'number'}" data-sortable="'to'">{{agerange.to}}</td>
                    <td data-title="'Action'" data-filter="{ action: 'assets/views/agerangesexport.html'}"><button type="button" name="" id="" class="btn btn-primary btn-sm btn-block" style='line-height:1' ng-click='edit("age", agerange)'>Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class='col-md-6'>
        
    </div>
</div>