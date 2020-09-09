<div class="row top-bar">
    <div class="col-2 logo">
        <a href="/">
            <img src="/images/logo.png" alt="Pizza You logo">
        </a>
    </div>
    <div class="col-6 top-bar__description">
        <span>Invite your friends and get for them and yourself a big discount!</span>
    </div>
    @auth
        <div class="col-2 top-bar__profile-buttons">
            <a href="/profile" class="profile-button">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
            <a href="{{ route('logout') }}" class="logout-button"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    @endauth
    @guest
        <div class="col-2 top-bar__auth-buttons">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                Sign in
            </button>
            <a href="/register">Sign up</a>
        </div>
    @endguest
    <div class="col-1 top-bar__cart-icon">
        <a href="/cart" class="">
            <span class="p1 fa-stack fa-2x has-badge" data-count="{{$session_order['total_amount']}}">
                <i class="p3 fa fa-shopping-basket fa-stack-1x xfa-inverse"></i>
            </span>
        </a>
    </div>
    <div class="col-1 top-bar__order-info">
        <div class="top-bar__change-currency">
            @if($currency == 'usd')
                <button data-currency="eur"><i class="fa fa-arrow-right"></i><i class="fa fa-eur"></i></button>
            @else
                <button data-currency="usd"><i class="fa fa-arrow-right"></i><i class="fa fa-usd"></i></button>
            @endif
        </div>
        <div class="top-bar__cart-info">
            <span class="price">{{$session_order['total_price']}}</span>
            <i class="fa fa-{{$currency}}"></i>
        </div>
    </div>
</div>
