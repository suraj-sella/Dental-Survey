<div class='row'>
	<div class='offset-md-3 col-md-6' ng-hide='isEntries'>
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
    <div class='offset-md-3 col-md-6' ng-show='isEntries'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='complaintsMasterTable'>
			<tbody>
				<tr ng-repeat="complaint in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{complaint.id}}</td>
					<td data-title="'Complaint'" data-filter="{ name: 'text'}" data-sortable="'name'">{{complaint.name}}</td>
					<td data-title="'Corresponding Findings'" data-filter="{ findingid: 'text'}" data-sortable="'findingid'">{{complaint.findingid}}</td>
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
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editName" placeholder="Complaint" required="" ng-model="editRow.name">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editFindingId" placeholder="FindingID" required="" ng-model="editRow.findingid">
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
                        <form ng-submit="insertComplaint(newRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newName" placeholder="Complaint" required="" ng-model="newRow.name">
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