@component('mail::message')

{{__('order.Thank_you')}}

@component('mail::table')

<table class="table">
    <tr>
        <th>{{__('common.Title')}}</th>
        <th>{{__('common.Quantity')}}</th>
        <th></th>
    </tr>
    @foreach($order->products as $product)
        <tr>
            <td align="center">{{$product->nomenclature->title}}</td>
            <td align="center">{{$product->quantity}}</td>
            <td align="center">{{$product->price}}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td align="center">{{__('common.Total')}}:</td>
        <td align="center">{{$order->totalPrice()}}</td>
    </tr>
</table>

@endcomponent

{{ config('app.name') }}
@endcomponent
