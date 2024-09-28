@extends('layout.Adminsidenav-layout')
@section('content')
    @include('components.rent.rent-list')
    @include('components.rent.rent-delete')
    @include('components.rent.rent-create')
    @include('components.rent.rent-update')
@endsection
