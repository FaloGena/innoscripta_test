@extends('layouts.main')
@section('content')
    <div class="row main-tabs">
        <div class="col-4 main-tabs__pizza">
            <button class="active">Pizza</button>
        </div>
        <div class="col-4 main-tabs__drinks">
            <button>Drinks</button>
        </div>
        <div class="col-4 main-tabs__sauces">
            <button>Sauces</button>
        </div>
    </div>
    <div class="row main-grid">
    @include('layouts.product-grid')
    </div>
@endsection
