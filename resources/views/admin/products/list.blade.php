@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
{{--@section('css')--}}
{{--    <style>--}}

{{--        .form {--}}
{{--            display: none;--}}
{{--            position: absolute;--}}
{{--            top: 50px;--}}
{{--            left: 400px;--}}
{{--            right: 0;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            @include('admin.alert')
            <div class="col-md-12">
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div class="table-list mt-4">
                        <a class="btn btn-outline-success" id="add-product" href="{{route('add_product')}}">Thêm sản phẩm</a>
                        <table class="container-fluid table table-bordered my-4">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Mô tả ngắn</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                static $i = 1;
                            @endphp
                            @foreach($products as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/product/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td>{{$item->cate_name}}</td>
                                    <td><img src="{{asset('storage/'.$item->image)}}" width="100px"/></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->description_short}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="form col-lg-6 col-md-6 col-sm-6">--}}
{{--                        @include('admin.products.add')--}}
{{--                    </div>--}}
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#add-product').click(function (){--}}
{{--                $('.form').fadeIn("slow");--}}
{{--                $('.table-list').fadeTo(300, 0.2);--}}
{{--            })--}}

{{--            $('#cancel').click(function (){--}}
{{--                $('.form').fadeOut("slow");--}}
{{--                $('.table-list').fadeTo(300, 1);--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}