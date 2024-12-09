<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        body {
            background-color: #2d2f33;
            color: #e0e0e0;
        }

        .page-content {
            padding: 20px;
        }

        .page-header h3 {
            color: #f7c52b;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: #d1d5db;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            background-color: #3a3f44;
            border: 1px solid #4e555b;
            border-radius: 5px;
            color: #e0e0e0;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .btn-primary {
            background-color: #f7c52b;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            color: #2d2f33;
        }

        .btn-primary:hover {
            background-color: #ffb400;
        }

        .alert {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            color: #ffffff;
        }

        .alert-danger {
            background-color: #e74a3b;
        }

        .current-image {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #ccc;
        }

        .current-image img {
            width: 50px;
            height: auto;
            border-radius: 5px;
            border: 1px solid #555;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <div class="page-header">
                <h3>Edit Product</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" required>
                        <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <div class="current-image">
                        <span>Current Image:</span>
                        <img src="{{ asset('productimage/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required step="0.01">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                </div>

                <div class="form-group text-right">
                    <input type="submit" class="btn btn-primary" value="Update Product">
                </div>
            </form>
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
