@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 300px">

        <!-- /.row -->

        <div class="row">

            <h1>Checkout</h1>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $product)

                    <tr>
                        <td>
                            {{$product->name}} <br/>
                            <img src="img/uploads/{{$product->model->product_image}}" style="width:100px" alt="image">


                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->subtotal()}}</td>
                        <td>
                            <a class='btn btn-warning' href="{{route('cart.minus', ['id' => $product->rowId, 'qty' => $product->qty ])}}">
                                -
                            </a>

                            <a class='btn btn-success' href="{{route('cart.plus', ['id' => $product->rowId, 'qty' => $product->qty  ])}}">
                                +
                            </a>

                            <a class='btn btn-danger' href="{{ route('cart.delete', [ 'id' => $product->rowId ]) }}">
                                x
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>


        <!--  CART TOTALS -->

        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">

                <tr>
                    <th>Items:</th>
                    <td><span class="amount">{{Cart::count()}}</span></td>
                </tr>
                <tr>
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>

                <tr>
                    <th>Order Total</th>
                    <td><strong><span class="amount">$

                                {{Cart::total()}}
                        </span></strong></td>
                </tr>


            </table>

        </div>
        <!-- CART TOTALS-->

    </div>

@endsection