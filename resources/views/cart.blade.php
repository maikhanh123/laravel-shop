
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

            </tr>
            </thead>
            <tbody>

            </tbody>

        </table>


    </div>


    <!--  CART TOTALS -->

    <div class="col-xs-4 pull-right ">
        <h2>Cart Totals</h2>

        <table class="table table-bordered" cellspacing="0">

            <tr>
                <th>Items:</th>
                <td><span class="amount">$50.00</span></td>
            </tr>
            <tr>
                <th>Shipping and Handling</th>
                <td>Free Shipping</td>
            </tr>

            <tr>
                <th>Order Total</th>
                <td><strong><span class="amount">$100.99</span></strong></td>
            </tr>


        </table>

    </div>
    <!-- CART TOTALS-->

</div>

@endsection