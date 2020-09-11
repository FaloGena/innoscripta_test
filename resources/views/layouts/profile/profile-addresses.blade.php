<div class="row align-items-center">
    <div class="col-lg-1">
        <button type="button" class="prev-slick float-right"><i class="fa fa-angle-left"></i></button>
    </div>
    <div class="col-lg-10 profile-addresses">
        <div class="col-lg-4 address-item">
            <div class="border border-dark rounded">
                <button type="button" class="btn btn-primary add-address" data-toggle="modal"
                        data-target="#newAddressModal">
                    +
                </button>
            </div>
        </div>
        @foreach($addresses as $address)
            <div class="col-lg-4 address-item">
                <div class="address-item__body border border-dark rounded" data-address="{{$address->id}}">
                    <div class="col-lg-12 address-name">
                        <span>{{$address->name}}</span>
                    </div>
                    <div class="col-lg-12 address-item__address">
                        <span>st. {{$address->street}}, {{$address->house}}</span>
                    </div>
                    <div class="col-lg-12 address-item__address">
                        <span>Floor: {{$address->floor ?? 'not specified'}}</span>
                        <span>Apartment: {{$address->apartment ?? 'not specified'}}</span>
                    </div>
                    <div class="col-lg-12 comment">
                        <span><i class="fa fa-comment"></i> {{$address->comment}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-lg-1">
        <button type="button" class="next-slick"><i class="fa fa-angle-right"></i></button>
    </div>
</div>
