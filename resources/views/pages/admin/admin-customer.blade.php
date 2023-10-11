
{{-- <link rel="stylesheet" href="cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
@extends('layout.admin_layout.admin-layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <div class="page-wrapper">
        <div class="page-content">

            @include('component.admin.customer-create')
            @include('component.admin.customer-list')

        </div>
    </div>

    <script>
        document.getElementById('customer').classList.add('mm-active');
    </script>
@endsection