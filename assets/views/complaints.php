<div class='row'>
    <div class='col-md-12'>
        <table class="table table-striped text-center table-bordered">
            <thead class='thead headsection'>
                <tr>
                <th class='emptycell'> <i class="fas fa-arrow-down"></i> Complaints <i class="fas fa-arrow-down"></i> </th>
                    <th colspan='27'> <i class="fas fa-arrow-down"></i> Age Groups <i class="fas fa-arrow-down"></i> </th>
                </tr>
                <tr>
                    <th class='emptycell'></th>
                    <th colspan='3' ng-repeat='range in ranges' ng-if='$index > 0'>{{ range.title }}</th>
                </tr>
                <tr>
                    <th> <i class="fas fa-arrow-right"></i> Genders <i class="fas fa-arrow-right"></i> </th>
                    <th ng-repeat="x in [].constructor(totalFields) track by $index">{{ genders[$index%3].title | limitTo : 1 }}</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat='x in compData'>
                    <td>{{ compData[$index].complaint }}</td>
                    <!-- <td>{{ compData.age1.all }}</td>
                    <td>{{ compData.age1.male }}</td>
                    <td>{{ compData.age1.female }}</td> -->
                </tr>
            </tbody>
        </table>
    </div>
</div>