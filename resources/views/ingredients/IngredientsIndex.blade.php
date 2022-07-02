@extends('layouts.app')

@section('title', trans("lang.ingredients"))

@section('content')
     @inject('permission', 'App\Http\Controllers\API\PermissionController')
    <ingredients-index
            products={{$permission->productManagePermission()}}
            product_category={{$permission->productCategoryManagePermission()}}
            product_brand={{$permission->productBrandManagePermission()}}
            product_group={{$permission->productGroupManagePermission()}}
            variant_attributes={{$permission->productVariantManagePermission()}}
            units={{$permission->productUnitManagePermission()}}
            tab_name={{$tab_name}}
            route_name={{$route_name}}
            
    >
    </ingredients-index>

@endsection
