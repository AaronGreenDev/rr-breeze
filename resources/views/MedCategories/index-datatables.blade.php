@extends('layouts.app')

@section('content')

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock List') }}
        </h2>
    </x-slot>

<p>
    <a class="btn btn-primary" href="/products/create"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
</p>

<table id="category-table" class="table table-bordered table-hover" class="display" style="width:100%">
    <thead>
        <th>Category</th>
        <th>Name</th>
        <th>Batch Number</th>
        <th>Location</th>
        <th>Expiry Date</th>
        <th>Quantity</th>
        <th>Status</th>
    </thead>
    <tbody>

    </tbody>
</table>



<script>
$(document).ready(function() {
    $('#category-table').DataTable({
        "serverSide": true,
        "ajax": {
            url: "{{ action('MedCategoryController@categoryDataSource') }}", 
            method: "get"
        },
        "columnDefs" : [{
            'targets': [7], 
            'orderable': false
        }],
    });
});
</script>

@endsection