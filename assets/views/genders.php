<div class='row'>
	<div class='offset-md-4 col-md-4 offset-md-4'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='gendersTable'>
			<tbody>
				<tr ng-repeat="gender in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{gender.id}}</td>
					<td data-title="'Title'" data-filter="{ title: 'text'}" data-sortable="'title'">{{gender.title}}</td>
					<td data-title="'Value'" data-filter="{ value: 'text'}" data-sortable="'value'">{{gender.value}}</td>
					<td data-title="'Action'" data-filter="{ action: 'assets/views/gendersexport.html'}">
                        <button type="button" class="btn btn-info btn-sm button-block" ng-click='editGender(gender)' style='line-height:1rem'>
                            <i class="fa fa-wrench faa-vertical"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm button-block" ng-click='deleteGender(gender)' style='line-height:1rem'>
                            <i class="fa fa-minus faa-vertical"></i>
                        </button>
                    </td>
				</tr>
                <tr ng-show="editShow">
                    <th scope="row" colspan="5">
                        <form ng-submit="updateGender(editRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editTitle" placeholder="Title" required="" ng-model="editRow.title">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editValue" placeholder="Value" required="" ng-model="editRow.value">
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-sm ">Update</button>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
                <tr ng-hide="editShow">
                    <th scope="row" colspan="5">
                        <form ng-submit="insertGender(newRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newTitle" placeholder="Title" required="" ng-model="newRow.title">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newValue" placeholder="Value" required="" ng-model="newRow.value">
                                </div>
                                <div class="form-group col-md-3">
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