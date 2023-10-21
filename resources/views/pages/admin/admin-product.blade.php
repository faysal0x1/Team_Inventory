@extends('layout.admin_layout.admin-layout')
@section('content')

<div class="page-wrapper">
    <div class="page-content">

        @include('component.admin.product.product-create')
        @include('component.admin.product.product-list')
        @include('component.admin.product.product-delete')
        @include('component.admin.product.product-update')
     

    </div>
</div>

<script>
   //  document.getElementById('dashboard').classList.add('mm-active');
    
</script>
@endsection