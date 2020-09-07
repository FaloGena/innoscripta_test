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
        @for ($i = 0; $i < 10; $i++)
            <div class="col-4 main-grid__card">
                <a href="">
                    <img src="/images/pizza-colorado.jpeg" alt="">
                </a>
                <div class="card-title">
                    <a href=""><h4>Pizza Colorado</h4></a>
                    <span>630g</span>
                </div>
                <div class="card-description">
                    <h5>Mmmmmmm.... so vkusno ya ne mogu. Berite srazu 15 shtuk ne pozhaleete. Top za svoi dengi</h5>
                </div>
                <div class="row card-buying">
                    <div class="col-6 price">
                        <span>9.99 <i class="fa fa-usd"></i></span>
                    </div>
                    <div class="col-6 to-cart">
                        <span class="">Add to cart</span>
                        <button>+</button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
