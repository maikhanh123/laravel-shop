@extends('layouts.app')
@section('content')
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <div class="single_product_thumb clearfix center">
        <img src="../img/uploads/{{$product->product_image}}" alt="aa">
    </div>

    <!-- Single Product Description -->

    <div class="single_product_desc clearfix">
            <span>
                <?php $category = App\Category::findOrFail($product->product_cat) ?>
                {{$category->cat_name}}
            </span>
        <h2><{{$product->product_name}}</h2>
        <p class="product-price">$ {{$product->product_price}}</p>
        <p class="product-desc">{{$product->product_des}}</p>
        <!-- Cart -->
        <form method="post">
            <div class="cart-fav-box d-flex align-items-center">
                <!-- <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button> -->
                <a href="<?php echo $_SERVER['PHP_SELF']?>?page=shop&cart=add&addId={{$product->id}}" class="btn essence-btn">Add to Cart</a>
            </div>
        </form>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->

@endsection


