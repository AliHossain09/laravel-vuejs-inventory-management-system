@extends('layouts.admin.app')


@section('topbar')
<back-topbar-component></back-topbar-component>
@endsection


@section('sidebar')
hello
<back-sidebar-component></back-sidebar-component>
@endsection

@section('content')
<edit-supplier-component :id="{{ $id }}"></edit-supplier-component>
@endsection