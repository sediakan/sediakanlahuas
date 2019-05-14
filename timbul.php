<link href="css/bootstrap-table.css" rel="stylesheet">
<script src="js/bootstrap-table.js"></script>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="#popup" class="btn btn-primary">Tambahkan Data</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data_test.php"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">Item ID</th>
						        <th data-field="name"  data-sortable="true">Item Name</th>
						        <th data-field="price" data-sortable="true">Item Price</th>
						        <th data-field="edit" data-sortable="true">Action</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>