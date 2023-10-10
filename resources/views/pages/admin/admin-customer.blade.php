@extends('layout.admin_layout.admin-layout')
@section('content')

    
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