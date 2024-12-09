<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* Additional styles for better layout */
        .table img {
            width: 80px; /* Adjust image size */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Crop images if necessary */
            border-radius: 4px; /* Optional: for rounded corners */
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3 class="text-white">All Products</h3>

                 <form action="{{ route('product_search') }}" method="GET" class="mb-3">
                    @csrf
                <input type="text" name="search" placeholder="Search products..." class="form-control" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
                
                <!-- Table to show all products -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-dark">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{!! Str::limit($product->description,50)!!}</td>
                                    <td>{{ number_format($product->price, 2) }}</td> <!-- Formatting price -->
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category}}</td>
                                    <td>
                                        <img src="{{ asset('productimage/'.$product->image) }}" alt="{{ $product->title }}">
                                    </td>
                                    <td>
                                       <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('delete_product', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper">
                        {{$products->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
