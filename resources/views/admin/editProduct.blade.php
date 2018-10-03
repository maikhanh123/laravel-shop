@extends('admin.app')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Form</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('products.update',['id' => $product->id]) }}" role="form" method="post" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            <div>
                                <div class="col-lg-6">
                                    <h1>Product information</h1>
                                    <div class="form-group <?php if($errors->has('product_name')) echo 'has-error'; ?>">
                                        <label>Product Name</label>
                                        <input name="product_name" class="form-control" placeholder="Product Name" value="{{$product->product_name}}">
                                        <span class="error">{{$errors->first('product_name')}}</span>
                                    </div>
                                    <div class="form-group <?php if($errors->has('product_cat_id')) echo 'has-error'; ?>">
                                        <label>Selects Category</label>
                                        <select name="product_cat_id" class="form-control">
                                            <option value="{{$product->product_cat}}">{{App\Category::findOrFail($product->product_cat)->cat_name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->cat_name }} </option>
                                            @endforeach
                                        </select>
                                        <span class="error">{{$errors->first('product_cat_id')}}</span>
                                    </div>
                                    <div class="form-group <?php if($errors->has('product_des')) echo 'has-error'; ?>">
                                        <label>Product Description</label>
                                        <textarea name="product_des" class="form-control" rows="3">{{$product->product_des}}</textarea>
                                        <span class="error">{{$errors->first('product_des')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="file">
                                        <span class="error">{{$errors->first('file')}}</span>
                                    </div>

                                    <div class="form-group">
                                        {{csrf_field()}}
                                        <button name="submit_add" type="submit" class="btn btn-default">Submit Button</button>
                                        <button name="reset" type="reset" class="btn btn-default">Reset Button</button>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>Product Price</h1>
                                    <label>Price</label> <span class="error">{{$errors->first('product_price')}}</span>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" name="product_price" class="form-control" placeholder="Product Price" value="{{$product->product_price}}">
                                    </div>
                                    <label>Price Reduce</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="number" name="product_reduce" class="form-control" placeholder="Price Reduce" value="{{$product->product_reduce}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="product_quantity" type="number" class="form-control" placeholder="Quantity" value="{{$product->product_quantity}}">
                                        <span class="error">{{$errors->first('product_quantity')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Update</label>
                                        <input name="product_dateUpdate" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        <p class="help-block">This is today on format: Month/Day/Year</p>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection
