<div class='row'>
	<div class='offset-md-3 col-md-6' ng-hide='isEntries'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='findingsMasterTable'>
			<tbody>
				<tr ng-repeat="finding in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{finding.id}}</td>
					<td data-title="'Finding'" data-filter="{ name: 'text'}" data-sortable="'name'">{{finding.name}}</td>
				</tr>
            </tbody>
		</table>
    </div>
    <div class='offset-md-3 col-md-6' ng-show='isEntries'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='FindingsMasterTable'>
			<tbody>
				<tr ng-repeat="finding in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{finding.id}}</td>
					<td data-title="'Finding'" data-filter="{ name: 'text'}" data-sortable="'name'">{{finding.name}}</td>
					<td data-title="'Action'" data-filter="{ action: 'assets/views/findingsmasterexport.html'}">
                        <button type="button" class="btn btn-info btn-sm button-block" ng-click='editFinding(finding)' style='line-height:1rem'>
                            <i class="fa fa-wrench faa-vertical"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm button-block" ng-click='deleteFinding(finding)' style='line-height:1rem'>
                            <i class="fa fa-minus faa-vertical"></i>
                        </button>
                    </td>
				</tr>
                <tr ng-show="editShow">
                    <th scope="row" colspan="5">
                        <form ng-submit="updateFinding(editRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editName" placeholder="Finding" required="" ng-model="editRow.name">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-info btn-sm ">Update</button>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
                <tr ng-hide="editShow">
                    <th scope="row" colspan="5">
                        <form ng-submit="insertFinding(newRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newName" placeholder="Finding" required="" ng-model="newRow.name">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm ">Insert</button>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
			</tbody>
		</table>
    </div>
    <div class="col-md-3">
        <button ng-show='isEntries' ng-click='populate(1)' class="btn btn-primary btn-sm ">Populate Automatically</button>
        <button ng-hide='isEntries' ng-click='populate(0)' class="btn btn-primary btn-sm ">Populate From User</button>
        <button ng-hide='isEntries' class='btn btn-light' ng-click='exportToExcel("#complaintsMasterTable")'>Export</button>
    </div>
</div>