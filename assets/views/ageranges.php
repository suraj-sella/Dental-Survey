<div class='row'>
	<div class='offset-md-4 col-md-4 offset-md-4'>
		<table class="table table-striped text-center table-bordered headsection" ng-table="tableParams" show-filter="true"
		 id='agerangesTable'>
			<tbody>
				<tr ng-repeat="agerange in $data">
					<td data-title="'Id'" data-filter="{ id: 'number'}" data-sortable="'id'">{{agerange.id}}</td>
					<td data-title="'Title'" data-filter="{ title: 'text'}" data-sortable="'title'">{{agerange.title}}</td>
					<td data-title="'From'" data-filter="{ from: 'number'}" data-sortable="'from'">{{agerange.from}}</td>
					<td data-title="'To'" data-filter="{ to: 'number'}" data-sortable="'to'">{{agerange.to}}</td>
                    <td data-title="'Action'" data-filter="{ action: 'assets/views/agerangesexport.html'}">
                        <button type="button" class="btn btn-info btn-sm button-block" ng-click='editAgeRange(agerange)' style='line-height:1rem'>
                            <i class="fa fa-wrench faa-vertical"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm button-block" ng-click='deleteAgeRange(agerange)' style='line-height:1rem'>
                            <i class="fa fa-minus faa-vertical"></i>
                        </button>
                    </td>
				</tr>
                <tr ng-show="editShow">
                    <th scope="row" colspan="5">
                        <form ng-submit="updateAgeRange(editRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editId" placeholder="Id" required="" readonly ng-model="editRow.id">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editTitle" placeholder="Title" required="" ng-model="editRow.title">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editFrom" placeholder="From" required="" ng-model="editRow.from">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="editTo" placeholder="To" required="" ng-model="editRow.to">
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
                        <form ng-submit="insertAgeRange(newRow)" class="ng-pristine ng-valid ng-valid-required">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newId" placeholder="Id" required="" readonly ng-model="newRow.id">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newTitle" placeholder="Title" required="" ng-model="newRow.title">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newFrom" placeholder="From" required="" ng-model="newRow.from">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control btn-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" id="newTo" placeholder="To" required="" ng-model="newRow.to">
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
</div>