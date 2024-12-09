<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style>
        /* Custom CSS for button spacing */
        .btn-container {
            display: flex;
        }

        .btn-container a + a {
            margin-left: 8px; /* Adjust to control the spacing between buttons */
        }
    </style>
</head>

<body>
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row">
                @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="productimage/{{$products->image}}" alt="{{ $products->title }}" class="img-fluid">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $products->title }}</h6>
                            <h6>Price <span>${{ $products->price }}</span></h6>
                        </div>
                        <div class="btn-container mt-3">
                            <a href="{{ route('product_details', ['id' => $products->id]) }}" class="btn btn-primary">Details</a>
                            <a href="{{route('add_cart',  $products->id)}}" class="btn btn-secondary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('home.footer')
</body>
</html>
