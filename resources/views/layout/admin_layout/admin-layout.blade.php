<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/figma-icon/Logo.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

	<!-- data table -->
	
	<link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
   
	
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script> 

	<script src="{{asset('assets/js/axios.min.js')}}"></script>
	<title>Inventory Management system</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('layout.admin_layout.admin-sidenav')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('layout.admin_layout.admin-header')
		<!--end header -->


		<!--start page wrapper -->
		@yield('content')
		<!--end page wrapper -->


		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
				class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Ostad Pro-Batch © 2023 Dynamites Team-3</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->

	{{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>


	<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('assets/js/config.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

	<script>
		$(function() {
			  $(".knob").knob();
		  });


		
	</script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>

	@yield('script')

</body>

</html>