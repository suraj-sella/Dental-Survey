<div class='row'>
	<div class='col-md-10' ng-hide='isEntries'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='complaintsMasterTable'>
			<tbody>
				<tr ng-repeat="complaint in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{complaint.id}}</td>
					<td data-title="'Complaint'" data-filter="{ name: 'text'}" data-sortable="'name'">{{complaint.name}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class='col-md-10' ng-show='isEntries'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='complaintsMasterTable'>
			<tbody>
				<tr ng-repeat="complaint in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{complaint.id}}</td>
					<td data-title="'Complaint'" data-filter="{ name: 'text'}" data-sortable="'name'">{{complaint.name}}</td>
					<td data-title="'Corresponding Findings'" data-filter="{ findingid: 'text'}" data-sortable="'findingid'">{{complaint.findingid.name}}</td>
					<td data-title="'Is Others?'" data-filter="{ isothers: 'text'}" data-sortable="'isothers'">{{complaint.isothers}}</td>
					<td data-title="'Action'" data-filter="{ action: 'assets/views/complaintsmasterexport.html'}">
						<button type="button" class="btn btn-info btn-sm button-block" ng-click='editComplaint(complaint)' style='line-height:1rem'>
							<i class="fa fa-wrench faa-vertical"></i>
						</button>
						<button type="button" class="btn btn-danger btn-sm button-block" ng-click='deleteComplaint(complaint)' style='line-height:1rem'>
							<i class="fa fa-minus faa-vertical"></i>
						</button>
					</td>
				</tr>
				<tr ng-show="editShow">
					<th scope="row" colspan="5">
						<form ng-submit="updateComplaint(editRow)" class="ng-pristine ng-valid ng-valid-required">
							<div class="form-row">
								<div class="form-group col-md-1">
									<input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
								</div>
								<div class="form-group col-md-4">
									<input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="editName" placeholder="Complaint" required="" ng-model="editRow.name">
								</div>
								<div class="form-group col-md-4">
									<input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="editFindingId" placeholder="FindingId" ng-model="editRow.findingid.name">
								</div>
								<div class="form-group col-md-2">
									<input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="editisOthers" placeholder="isOthers" required="" ng-model="editRow.isothers">
								</div>
								<div class="form-group col-md-1">
									<button type="submit" class="btn btn-info btn-sm ">Update</button>
								</div>
							</div>
						</form>
					</th>
				</tr>
				<tr ng-hide="editShow">
					<th scope="row" colspan="5">
						<form ng-submit="insertComplaint(newRow)" class="ng-pristine ng-valid ng-valid-required">
							<div class="form-row">
								<div class="form-group col-md-1">
									<input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
								</div>
								<div class="form-group col-md-4">
									<input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
									 id="newName" placeholder="Complaint" required="" ng-model="newRow.name">
								</div>
								<div class="form-group col-md-4">
									<div ng-dropdown-multiselect="" options="findingdata" selected-model="newRow.findingid" extra-settings="findingsettings"
									 translation-texts="translationtexts"></div>
								</div>
								<div class="form-group col-md-2">
									<select class="btn btn-sm btn-info" name="isOthers" id="isOthers" ng-options="option.name for option in isothersdata track by option.id"
									 ng-model="newRow.isothers"></select>
								</div>
								<div class="form-group col-md-1">
									<button type="submit" class="btn btn-primary btn-sm ">Insert</button>
								</div>
							</div>
						</form>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-2">
		<button ng-show='isEntries' ng-click='populate(1)' class="btn btn-primary btn-sm ">Populate Automatically</button>
		<div ng-hide="isEntries" class="btn-group btn-group-sm" role="group" aria-label="...">
			<button ng-click='populate(0)' class="btn btn-primary btn-sm ">Populate From User</button>
			<button class='btn btn-primary' ng-click='exportToExcel("#complaintsMasterTable")'>Export</button>
		</div>
	</div>
</div>