@extends('admin.app')

@section('content')
<div id="page-wrapper">
    {{--@if(Session::has('success'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{Session::get('success')}}--}}
        {{--</div>--}}
    {{--@endif--}}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products Table</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTable clothings
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Reduce (%)</th>
                            <th>Quantity</th>
                            <th>Date Create</th>
                            <th>Date Update</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="product">

                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <!-- <a role="button" href=""> -->

                                {{$product->product_name}}
                                <br>
                                <!-- <img src="https://cdn.pixabay.com/photo/2017/10/05/06/46/asia-2818562_960_720.jpg" style="width:100px"> -->
                                <img src="../../img/uploads/{{$product->product_image}}" style="width:100px">
                                <!-- </a>  -->
                            </td>
                            <td>{{$product->product_des}}</td>
                            <td class="center">
                                <?php $categories = App\category::findOrFail($product->product_cat) ?>
                                {{$categories->cat_name}}
                            </td>
                            <td class="center">{{$product->product_price}}</td>
                            <td class="center">{{$product->product_reduce}}</td>
                            <td class="center">{{$product->product_quantity}}</td>
                            <td class="center">{{$product->product_dateCreate}}</td>
                            <td class="center">{{$product->product_dateUpdate}}</td>
                            <td class="center">
                                <button class="btn btn-danger js-delete" data-product-id="{{$product->id}}" data-token="{{csrf_token()}}"><span class="glyphicon glyphicon-remove"></span></button></br>
                                <a style="margin-top: 5px" class="btn btn-primary" href="products/{{$product->id}}/edit " ><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->
@endsection

