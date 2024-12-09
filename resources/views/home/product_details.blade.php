<!DOCTYPE html>
<html>

<head>
    @include('home.css') <!-- Include your CSS -->
    <style>
        .product-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .product-card img {
            border-radius: 8px;
            width: 100%;
            height: auto;
            object-fit: contain; /* Ensure the full image is shown without cropping */
        }

        .product-info h4 {
            font-weight: bold;
            color: #333;
        }

        .product-info p {
            color: #555;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header') <!-- Include the header -->

        <!-- Product Details Section -->
        <section class="product_details_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h6>Latest Products</h6>
                </div>
                
                <div class="product-card">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-md-6">
                            <img src="/productimage/{{ $product->image }}" alt="{{ $product->title }}" class="img-fluid">
                        </div>
                        
                        <!-- Product Information -->
                        <div class="col-md-6">
                            <div class="product-info">
                                <h6>Title</h6>
                                <p>{{ $product->title }}</p>
                                
                                <h6>Price</h6>
                                <p>${{ $product->price }}</p>
                                
                                <h6>Quantity</h6>
                                <p>{{ $product->quantity }}</p>
                                
                                <h6>Category</h6>
                                <p>{{ $product->category ?? 'N/A' }}</p> <!-- Show category name if it exists -->

                                <h6>Description</h6>
                                <p>{{ $product->description }}</p>
                                
                                <!-- Action Buttons -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('home.footer') <!-- Include the footer -->

</body>

</html>
