@extends('website.layouts.master')

@section('title')
{{trans('website_trans.checkout')}}
@endsection

@section('content')
<div class="container">
  <div class="row py-5">
    <div class="col-7">
      <div class="card">
        <div class="card-title">Customer Details</div>
        <div class="card-body">
          <form action="">
          <div class="row">
          <div class="col">
              <label for="firstname" class="form-label">{{trans('website_trans.first_name')}}</label>
              <input type="text" class="form-control" value="{{$user->fname}}" name="firstname"  id="firstname" placeholder="your first name">
          </div>
          <div class="col">
              <label for="lastname" class="form-label">{{trans('website_trans.last_name')}}</label>
              <input type="text" class="form-control" value="{{$user->lname}}" name="lastname"  id="lastname" placeholder="your last name">
          </div>

          </div>
          <div class="row">
          <div class="col">
              <label for="email" class="form-label">{{trans('website_trans.email')}}</label>
              <input type="email" class="form-control" value="{{$user->email}}" name="email"  id="email" placeholder="your email">
          </div>
          <div class="col">
              <label for="phone" class="form-label">{{trans('website_trans.phone')}}</label>
              <input type="phone" class="form-control" value="{{$user->phone}}" name="phone"  id="phone" placeholder="your phone">
          </div>

          </div>
          <div class="row">
          <div class="col">
              <label for="address1" class="form-label">{{trans('website_trans.address_1')}}</label>
              <input type="text" class="form-control" value="{{$user->address1}}" name="address1"  id="address1" placeholder="address1">
          </div>
          <div class="col">
              <label for="address2" class="form-label">{{trans('website_trans.address_2')}}</label>
              <input type="text" class="form-control" value="{{$user->address2}}" name="address2"  id="address2" placeholder="address2">
          </div>
          </div>
          <div class="row">
          <div class="col">
              <label for="city" class="form-label">{{trans('website_trans.city')}}</label>
              <input type="text" class="form-control" value="{{$user->city}}" name="city"  id="city" placeholder="city">
          </div>
          <div class="col">
              <label for="country" class="form-label">{{trans('website_trans.country')}}</label>
              <input type="text" class="form-control" value="{{$user->country}}" name="country"  id="country" placeholder="country">
          </div>
          <div class="col">
              <label for="pincode" class="form-label">{{trans('website_trans.pincode')}}</label>
              <input type="text" class="form-control" value="{{$user->pincode}}" name="pincode"  id="pincode" placeholder="pincode">
          </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-5">
    <div class="card">
        <div class="card-title text-center"><h3>{{trans('website_trans.order_details')}}</h3></div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>

                  <tr>
                    <th>#</th>
                    <th>{{trans('website_trans.product')}}</th>
                    <th>{{trans('website_trans.quantity')}}</th>
                    <th>{{trans('website_trans.selling_price')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $i = 1; @endphp
                  @foreach($carts as $cart)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$cart->product->name}}</td>
                      <td>{{$cart->qty}}</td>
                      <td>{{$cart->product->selling_price}}</td>
                    </tr>
                  @endforeach
                  </tbody>
            </table>
        </div>
        <button class="btn btn-outline-primary float-end">{{trans('website_trans.place_order')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection