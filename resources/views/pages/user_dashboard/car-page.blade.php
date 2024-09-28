@extends('layout.sidenav-layout')
@section('content')
    @include('components.user_components.car.car-list')
    @include('components.user_components.car.carRentalRequest')
    @include('components.user_components.car.carDetails')
@endsection
