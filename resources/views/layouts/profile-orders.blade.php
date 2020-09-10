@foreach($orders as $order)
    <div class="col-lg-4 order">
        <div class="order-border">
            <div class="col-lg-12 header">
                <span>No: {{$order->id}}</span>
                <span class="float-right">Total: {{$order->price}} <i class="fa fa-{{$order->currency}}"></i></span>
            </div>
            <div class="col-lg-12 address">
                <span>Address:</span>
                <span>{{$order->address}}</span>
            </div>
            <div class="col-lg-12 line"></div>
            <div class="col-lg-12 item-list-title">
                <span>List of products:</span>
            </div>
            <div class="col-lg-12 item-list collapse" id="collapse-{{$order->id}}">
                @foreach($order->products as $product)
                    <div class="row item">
                        <div class="col-lg-3 image">
                            <img src="/images/{{$product->type}}-{{$product->name}}.jpeg" alt="">
                        </div>
                        <div class="col-lg-6 name">
                            <span>{{$product->name}}</span>
                        </div>
                        <div class="col-lg-3 amount">
                            <span>x{{$product->amount}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 expand-arrow">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse-{{$order->id}}" aria-expanded="false" aria-controls="collapse-{{$order->id}}">
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>
        </div>
    </div>
@endforeach
