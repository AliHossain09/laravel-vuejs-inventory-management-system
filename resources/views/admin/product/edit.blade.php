@extends('layouts.admin.app')


@section('topbar')
<back-topbar-component></back-topbar-component>
@endsection


@section('sidebar')
hello
<back-sidebar-component></back-sidebar-component>
@endsection

@section('content')
<edit-product-component :id="{{ $id }}"></edit-product-component>
@endsection