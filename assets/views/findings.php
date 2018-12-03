<div class='row'>
    <div class='col-md-12'>
        <table class="table table-striped text-center table-bordered">
            <thead class='thead headsection'>
                <tr>
                    <th>Findings</th>
                    <th colspan='9'>Age Groups</th>
                </tr>
                <tr>
                    <th></th>
                    <th ng-repeat='range in ranges' ng-if='$index > 0'>{{ range.title }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>