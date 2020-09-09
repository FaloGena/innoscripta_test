@foreach ($pizzas as $pizza)
    <div class="col-4 main-grid__card">
        <a href="">
            <img src="/images/pizza-{{$pizza->name}}.jpeg" alt="">
        </a>
        <div class="card-title">
            <a href=""><h4>Pizza {{$pizza->name}}</h4></a>
            <span>{{$pizza->weight}}g</span>
        </div>
        <div class="card-description">
            <h5>{{$pizza->description}}</h5>
        </div>
        <div class="row card-buying">
            <div class="col-6 price">
                @if($currency == 'eur')
                    <span>{{$pizza->price_eur}} <i class="fa fa-eur"></i></span>
                @else
                    <span>{{$pizza->price_usd}} <i class="fa fa-usd"></i></span>
                @endif
            </div>
            @php
            $item_id = $pizza->id;
            $amount = $order[$item_id] ?? 0;
            @endphp
            <div class="col-6 to-cart">
                <span class="">Add to cart</span>
                <span class="counter">{{$amount}}</span>
                <button data-item="{{$pizza->id}}">+</button>
            </div>
        </div>
    </div>
@endforeach
