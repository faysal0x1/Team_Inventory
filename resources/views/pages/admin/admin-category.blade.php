@extends('layout.admin_layout.admin-layout')
@section('content')

<div class="page-wrapper">
    <div class="page-content">

        @include('component.admin.category.category-create')
        @include('component.admin.category.category-list')
        @include('component.admin.category.category-update')
        @include('component.admin.category.category-delete')

    </div>
</div>

<script>
   //  document.getElementById('dashboard').classList.add('mm-active');
    
</script>
@endsection

