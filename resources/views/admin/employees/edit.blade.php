@extends('layouts.admin.app')


@section('topbar')
<back-topbar-component></back-topbar-component>
@endsection


@section('sidebar')
<back-sidebar-component></back-sidebar-component>
@endsection

@section('content')
<edit-employee-component :id="{{ $id }}"></edit-employee-component>
@endsection