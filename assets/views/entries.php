<div class='row'>
	<div class='offset-md-1 col-md-10 offset-md-1'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='entriesTable'>
			<tbody>
				<tr ng-repeat="entry in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{entry.id}}</td>
					<td data-title="'Age'" data-filter="{ age: 'number'}" data-sortable="'age'">{{entry.age}}</td>
					<td data-title="'Sex'" data-filter="{ sex: 'text'}" data-sortable="'sex'">{{entry.sex}}</td>
					<td data-title="'Complaint(s)'" data-filter="{ comp: 'text'}" data-sortable="'comp'">{{entry.comp}}</td>
                    <td data-title="'Finding(s)'" data-filter="{ find: 'text'}" data-sortable="'find'">{{entry.find}}</td>
                    <td data-title="'Action'" data-filter="{ action: 'assets/views/entriesexport.html'}">
                        <button type="button" class="btn btn-info btn-sm button-block" ng-click='editEntry(entry)' style='line-height:1rem'>
                            <i class="fa fa-wrench faa-vertical"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm button-block" ng-click='deleteEntry(entry)' style='line-height:1rem'>
                            <i class="fa fa-minus faa-vertical"></i>
                        </button>
                    </td>
				</tr>
                <tr ng-show="editShow">
                    <th scope="row" colspan="6">
                        <form ng-submit="updateEntry(editRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editAge" placeholder="Age" required="" ng-model="editRow.age">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editSex" placeholder="From" required="" ng-model="editRow.sex">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editComp" placeholder="To" required="" ng-model="editRow.comp">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editFind" placeholder="To" required="" ng-model="editRow.find">
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="submit" class="btn btn-info btn-sm ">Update</button>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
                <tr ng-hide="editShow">
                    <th scope="row" colspan="6">
                        <form ng-submit="insertEntry(newRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newAge" placeholder="Age" required="" ng-model="newRow.age">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newSex" placeholder="Sex" required="" ng-model="newRow.sex">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newComp" placeholder="Complaint(s)" required="" ng-model="newRow.comp">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newFind" placeholder="Finding(s)" required="" ng-model="newRow.findd">
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
</div>