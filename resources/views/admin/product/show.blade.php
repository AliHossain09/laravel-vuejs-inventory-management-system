@extends('layouts.admin.app')


@section('topbar')
<back-topbar-component></back-topbar-component>
@endsection


@section('sidebar')
<back-sidebar-component></back-sidebar-component>
@endsection


@section('content')
<show-product-component :id="{{ $id }}"></show-product-component>
@endsection