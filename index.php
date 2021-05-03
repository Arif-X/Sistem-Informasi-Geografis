<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="lib/lib/datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="lib/lib/datatables/FixedColumns-3.3.2/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="lib/lib/datatables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
	<script src="lib/lib/datatables/DataTables-1.10.23/js/jquery.dataTables.min.js"></script>    
	<script src="lib/lib/datatables/Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>
	<script src="lib/lib/datatables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<script src="lib/lib/datatables/FixedColumns-3.3.2/js/dataTables.fixedColumns.min.js"></script>  
	<link href="lib/mapbox/css/style.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>		
	<style type="text/css">
		body { margin: 0; padding: 0; }
		#map {
			position: relative;
			width: 100%;
			height: 450px;
		}
		#mapUpdate {
			position: relative;
			width: 100%;
			height: 450px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="mt-4 mb-4 pt-4 pb-4 text-center text-white bg-primary rounded">
					<div style="width: 200px;height: 200px;border:8px solid white" class="m-auto bg-primary rounded-pill">
						<img src="lib/assets/images/ilustartor.svg" width="100%">
					</div>
					<h2>Sistem Informasi Geografis</h2>
				</div>
			</div>
		</div>		

		<div class="row mb-3">
			<div class="col-lg-12">
				<div>
					<button type="button" class="btn btn-primary btn-sm" id="create" data-toggle="modal">
						<i class="fa fa-plus mr-1" aria-hidden="true"></i> Tambah Data
					</button> 
					<a href="map.php" target="_blank">
						<button type="button" class="btn btn-primary btn-sm">
							<i class="fa fa-map mr-1" aria-hidden="true"></i> Lihat Data Map
						</button>
					</a>
				</div>
			</div>
		</div>		

		<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelHeading" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modelHeading">Set Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					
					<div class="modal-body">
						<form name="formData" id="formData" enctype="multipart/form-data">
							<div class="col-md-12">
								<input type="hidden" name="id" id="id" value>

								<div class="form-group">
									<label for="">Nama</label>
									<input type="text" name="nama" id="nama" class="form-control" required value>
								</div>	

								<div class="form-group">
									<label for="">Alamat</label>
									<input type="text" name="alamat" id="alamat" class="form-control" required value>
								</div>

								<div class="form-group">
									<label for="">Tipe</label>
									<input type="text" name="tipe" id="tipe" class="form-control" required value>
								</div>

								<div class="form-group">
									<label for="">Lokasi</label>
									<div id="map"></div>
									<input type="hidden" name="latitude" id="latitude">							
									<input type="hidden" name="longitude" id="longitude">							
								</div>																

								<div class="form-group">
									<label for="">Foto (Opsional)</label>
									<input type="file" name="upload" id="upload" class="form-control">
								</div>

								<button class="btn btn-primary btn-sm" name="save" id="saveBtn" style="width: 100%">Simpan</button>
							</div>
						</form>								
					</div>
				</div>				
			</div>
		</div>

		<div class="modal fade bd-example-modal-lg" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteHeading">Hapus</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">

								<form name="formDelete" id="formDelete">
									<input type="hidden" name="id" id="idDel">
									<h6>Ingin Menghapus Data <strong id="datas"></strong>?</h6>
									<div class="text-right">
										<button class="btn btn-danger btn-sm" id="deleteBtn" >Hapus</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered" id="table-hotel">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Longitude</th>
						<th>Latitude</th>
						<th>Tipe</th>
						<th width="100px">Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">		
		var tabel = null;

		$.ajaxSetup({
			cache: false,
		});

		mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpcG9uIiwiYSI6ImNrbjV3cmZ5NTA4aDUyd25zenk3MmlwYzgifQ.YbJ_Ir794eD8VlrVvpX64g';

		$(document).ready(function() {
			tabel = $('#table-hotel').DataTable({
				"processing": true,
				"serverSide": true,
				"ordering": true, 
				"order": [[ 1, 'asc' ]], 
				"ajax":
				{
					"url": "backend/hotel/view.php", 
					"type": "POST"
				},
				"deferRender": true,
				"aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], 
				"columns": [
				{ "data": "nama" },  
				{ "data": "alamat" }, 
				{ "data": "longitude" }, 
				{ "data": "latitude" }, 
				{ "data": "tipe" }, 
				{ 
					"render": function ( data, type, row ) { 
						var html  = "<a href='javascript:void(0)' data-toggle='tooltip' data-id='" + row.id + "' data-original-title='Edit' class='edit btn btn-primary btn-sm editData'>Edit</a>  "
						html += "<a href='javascript:void(0)' data-toggle='tooltip' data-id='" + row.id + "' data-original-title='Delete' class='delete btn btn-danger btn-sm deleteData'>Hapus</a>"

						return html
					}
				},
				],
			});

			$('body').on('click', '.editData', function () {
				var id = $(this).data('id');				
				$.ajax({
					url: "backend/hotel/get-id.php/?id=" + id,
					type: 'GET',					
					dataType: 'json',
					success: function(data) {     
						if (data) {

							document.getElementById("map").innerHTML = '';

							var map = new mapboxgl.Map({
								container: 'map',
								style: 'mapbox://styles/mapbox/streets-v11',
								center: [data[0].longitude, data[0].latitude],
								zoom: 7
							});							

							map.addControl(
								new MapboxGeocoder({
									accessToken: mapboxgl.accessToken,
									mapboxgl: mapboxgl
								})
								);

							map.addControl(new mapboxgl.NavigationControl());

							map.addControl(
								new mapboxgl.GeolocateControl({
									positionOptions: {
										enableHighAccuracy: true
									},
									trackUserLocation: true
								})
								);

							map.on('style.load', function() {
								var coordinates = [data[0].longitude, data[0].latitude];
								var lat = data[0].latitude;
								$('#latitude').val(lat);
								var lng = data[0].longitude;
								$('#longitude').val(lng);
								new mapboxgl.Popup()				
								.setLngLat(coordinates)
								.setHTML('')
								.addTo(map);
							});	

							map.on('style.load', function() {
								map.on('click', function(e) {				
									var coordinates = e.lngLat;
									var lat = e.lngLat.wrap().lat;
									$('#latitude').val(lat);
									var lng = e.lngLat.wrap().lng;
									$('#longitude').val(lng);
									new mapboxgl.Popup()				
									.setLngLat(coordinates)
									.setHTML('')
									.addTo(map);
								});
							});	


							map.on('load', function() {
								map.resize();
							});
							$('#modelHeading').html("Edit");
							$('#myModal').modal('show');
							$('#id').val(data[0].id);							
							$('#nama').val(data[0].nama);
							$('#alamat').val(data[0].alamat);
							$('#tipe').val(data[0].tipe);
							
						}
					},
					error: function() {
						alert("No");
					}
				});
			});

			$('body').on('click', '.deleteData', function () {
				var id = $(this).data('id');
				$.ajax({
					url: "backend/hotel/get-id.php/?id=" + id,
					type: 'GET',
					dataType: 'json',
					success: function(data) {     
						if (data) {
							$('#deleteHeading').html("Hapus");
							$('#deleteModal').modal('show');
							$('#idDel').val(data[0].id);
							$('#idDel').attr('readonly', 'true');
							$('#datas').html(data[0].nama + ' Dengan ID ' + data[0].id);
						}
					},
					error: function() {
						alert("No");
					}
				});
			});

			$('#create').click(function () {
				$('#modelHeading').html("Tambah");
				$('#formData').trigger("reset");				

				// Create
				var map = new mapboxgl.Map({
					container: 'map',
					style: 'mapbox://styles/mapbox/streets-v11',			
					center: [112.63033862807194, -7.982580467907199],
					zoom: 13
				});

				map.addControl(
					new MapboxGeocoder({
						accessToken: mapboxgl.accessToken,
						mapboxgl: mapboxgl
					})
					);

				map.addControl(new mapboxgl.NavigationControl());

				map.addControl(
					new mapboxgl.GeolocateControl({
						positionOptions: {
							enableHighAccuracy: true
						},
						trackUserLocation: true
					})
					);


				map.on('style.load', function() {
					map.on('click', function(e) {				
						var coordinates = e.lngLat;
						var lat = e.lngLat.wrap().lat;
						$('#latitude').val(lat);
						var lng = e.lngLat.wrap().lng;
						$('#longitude').val(lng);
						new mapboxgl.Popup()				
						.setLngLat(coordinates)
						.setHTML('')
						.addTo(map);
					});
				});	

				map.on('load', function() {
					map.resize();
				});

				$('#saveBtn').val("create");
				$('#id').val('');				
				$('#myModal').modal('show');				
			});

			$('#saveBtn').click(function (e) {
				e.preventDefault();
				const upload = $('#upload').prop('files')[0];

				let formData = new FormData();
				formData.append('upload', upload);
				formData.append('id', $('#id').val());
				formData.append('nama', $('#nama').val());
				formData.append('alamat', $('#alamat').val());
				formData.append('tipe', $('#tipe').val());
				formData.append('latitude', $('#latitude').val());
				formData.append('longitude', $('#longitude').val());

				$.ajax({
					data: $('#formData').serialize(),
					url: "backend/hotel/create-or-update.php",
					type: "POST",
					dataType: 'json',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,				
					success: function (data) {
						$('#longitude').val('');
						$('#latitude').val('');
						$('#formData').trigger("reset");
						$('#myModal').modal('hide');
						tabel.draw();
					},
					error: function (data) {
						console.log('Error:', data);
						$('#myModal').html('Simpan');
					}
				});
			});

			$('#deleteBtn').click(function (e) {
				e.preventDefault();
				$.ajax({
					data: $('#formDelete').serialize(),
					url: "backend/hotel/delete.php",
					type: "POST",
					dataType: 'json',
					success: function (data) {
						$('#formDelete').trigger("reset");
						$('#deleteModal').modal('hide');
						tabel.draw();
					},
					error: function (data) {
						console.log('Error:', data);
						$('#deleteBtn').html('Simpan');
					}
				});
			});			
		});
	</script>
</body>
</html>