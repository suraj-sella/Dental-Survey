<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class='col-md-10'>
    <table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true">
        <tbody>
            <tr ng-repeat="entry in $data">
                <td data-title="'Age'" data-filter="{ age: '<?php echo base_url();?>assets/views/ageRange.html'}" data-sortable="'age'">{{entry.age}}</td>
                <td data-title="'Gender'" data-filter="{ sex: 'select'}" data-filter-data='genders' data-sortable="'sex'">{{entry.sex}}</td>
                <td data-title="'Complaint(s)'" data-filter="{ comp: 'text'}" data-sortable="'comp'">{{entry.comp}}</td>
                <td data-title="'Finding(s)'" data-filter="{ find: 'text'}" data-sortable="'find'">{{entry.find}}</td>
                <td data-title="'Match'" data-filter="{ match: 'select'}" data-filter-data='matches' data-sortable="'match'">{{entry.match}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class='col-md-2'>
    <table class="table text-center table-bordered headsection" ng-table>
        <tbody>
            <td data-title="'Total'">{{tableParams.total()}}</td>
        </tbody>
    </table>
</div>