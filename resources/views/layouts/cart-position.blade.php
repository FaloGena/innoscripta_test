@foreach($products as $product)
    @php
        $name = $product->name;
        $card_title =
            ($product->type === 'pizza') ? 'Pizza '.$name : ( ($product->type === 'drink') ? $name : $name.' sauce');
    @endphp
    <div class="row cart-position" data-item="{{$product->id}}">
        <div class="col-lg-3 cart-position__picture">
            <img src="/images/{{$product->type}}-{{$name}}.jpeg" alt="">
        </div>
        <div class="col-lg-5 cart-position__info">
            <div class="title">
                <h5>{{$card_title}}</h5>
            </div>
            <div class="weight">
                <span>{{$product->weight}}g</span>
            </div>
        </div>
        <div class="col-lg-2 cart-position__price">
            <div class="price">
                @if($currency == 'eur')
                    <span>{{$product->price_eur}} <i class="fa fa-eur"></i></span>
                @else
                    <span>{{$product->price_usd}} <i class="fa fa-usd"></i></span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 cart-position__amount">
            @php
                $amount = $session_order[$product->id] ?? 0;
            @endphp
            <div class="amount">
                <button class="change-cart" data-operation="remove" data-item="{{$product->id}}">-</button>
                <span class="change-cart counter" data-item="{{$product->id}}">{{$amount}}</span>
                <button class="change-cart" data-operation="add" data-item="{{$product->id}}">+</button>
            </div>
        </div>
    </div>
@endforeach
