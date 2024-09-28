@extends('layout.Adminsidenav-layout')
@section('content')
    @include('components.car.car-list')
    @include('components.car.car-delete')
    @include('components.car.car-create')
    @include('components.car.car-update')
@endsection
