@extends('layout.sidenav-layout')
@section('content')
    @include('components.user_components.rent.rent-list')
    @include('components.user_components.rent.rent-cancel')
    @include('components.user_components.rent.rent-create')
@endsection
