@extends('layouts.app')

@section('title', trans("lang.ingredients"))

@section('content')
    @inject('permission', 'App\Http\Controllers\API\PermissionController')
    <ingredient-details
            :id="{{ $id}}"
            tab_name="{{$tab_name}}"
            route_name="{{$route_name}}">
    </ingredient-details>
@endsection