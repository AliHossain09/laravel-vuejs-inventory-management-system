@extends('layouts.admin.app')


@section('topbar')
<back-topbar-component></back-topbar-component>
@endsection


@section('sidebar')
hello
<back-sidebar-component></back-sidebar-component>
@endsection

@section('content')
<edit-stock-component :id="{{ $id }}"></edit-stock-component>
@endsection