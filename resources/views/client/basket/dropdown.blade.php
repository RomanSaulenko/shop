
<div class="container">

    <div class="row w-100 total-header-section p-2 border-bottom">
        <div class="col">
            {{__('common.Total')}}: <span class="text-info">{{$total}}</span>
        </div>
    </div>

    @foreach($basketProducts as $item)

        <div class="row border-bottom">

            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg" class="img-fluid">
            </div>
            <div class="col-lg-3 col-sm-3 col-3">
                {{$item->name}}

            </div>
            <div class="col-lg-2 col-sm-2 col-2">
                <span class="price text-info"> {{$item->price}}</span>
            </div>
            <div class="col-lg-1 col-sm-1 col-1">
                <span class="count"> {{$item->qty}}</span>
            </div>
            <div class="col-lg-1 col-sm-1 col-1 sm-quickcart-remove ">
                <span class="align-middle" onclick="Cart.removeCartItem('{{$item->rowId}}');"> </span>
            </div>
        </div>
    @endforeach

    <div class="w-100 p-3">
        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
            <a class="btn btn-primary" href="{{route('basket.checkout')}}">
                {{ __('common.To_basket') }}
            </a>
        </div>
    </div>

</div>
