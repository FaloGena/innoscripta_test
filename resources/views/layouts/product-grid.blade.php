@foreach ($products as $product)
    @php
    $card_visibility = ($product->type == 'pizza') ? '' : 'hidden';
    $name = $product->name;
    $card_title =
        ($product->type === 'pizza') ? 'Pizza '.$name : ( ($product->type === 'drink') ? $name : $name.' sauce');
    @endphp
    <div class="col-4 main-grid__card {{$product->type}} {{$card_visibility}}">
            <img src="/images/{{$product->type}}-{{$name}}.jpeg" alt="">
        <div class="card-title">
            <h4>{{$card_title}}</h4>
            <span>{{$product->weight}}g</span>
        </div>
        <div class="card-description">
            <h5>{{$product->description}}</h5>
        </div>
        <div class="row card-buying">
            <div class="col-6 price">
                @if($currency == 'eur')
                    <span>{{$product->price_eur}} <i class="fa fa-eur"></i></span>
                @else
                    <span>{{$product->price_usd}} <i class="fa fa-usd"></i></span>
                @endif
            </div>
            @php
            $item_id = $product->id;
            $amount = $session_order[$item_id] ?? 0;
            $minus_visibility = ($amount == 0) ? 'hidden' : '';
            @endphp
            <div class="col-6 to-cart">
                <button class="minus-button {{$minus_visibility}}" data-operation="remove" data-item="{{$product->id}}">-</button>
                <span class="counter" data-item="{{$product->id}}">{{$amount}}</span>
                <button data-operation="add" data-item="{{$product->id}}">+</button>
            </div>
        </div>
    </div>
@endforeach
