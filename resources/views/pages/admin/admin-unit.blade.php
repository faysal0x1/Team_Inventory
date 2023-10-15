@extends('layout.admin_layout.admin-layout')
@section('content')

<div class="page-wrapper">
    <div class="page-content">

        @include('component.admin.unit.unit-create')
        @include('component.admin.unit.unit-list')
        @include('component.admin.unit.unit-update')
        @include('component.admin.unit.unit-delete')

    </div>
</div>

<script>
   //  document.getElementById('dashboard').classList.add('mm-active');
    
</script>
@endsection