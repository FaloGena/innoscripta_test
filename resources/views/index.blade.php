@extends('layouts.main')
@section('content')
    <div class="row main-tabs">
        <div class="col-4 main-tabs__pizza">
            <button data-target="pizza" class="active">Pizza</button>
        </div>
        <div class="col-4 main-tabs__drinks">
            <button data-target="drink">Drinks</button>
        </div>
        <div class="col-4 main-tabs__sauces">
            <button data-target="sauce">Sauces</button>
        </div>
    </div>
    <div class="row main-grid">
    @include('layouts.product-grid')
    </div>
@endsection
