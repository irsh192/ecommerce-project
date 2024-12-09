<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        body {
            background-color: #333;
            font-family: Arial, sans-serif;
        }

        h3 {
            color: white;
            margin-top: 20px;
            text-align: center;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px auto;
            width: 100%;
            max-width: 500px; /* Limit the max-width */
            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            color: white;
            margin-bottom: 5px;
            display: block; /* Ensure the label is on its own line */
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            height: 35px;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            margin-top: 5px;
            background-color: #555;
            color: white;
        }

        textarea {
            height: 80px; /* Adjusted height for better usability */
            resize: none; /* Prevent resizing */
        }

        .btn {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .btn:hover {
            background-color: #218838;
        }

        .error {
            color: #ff4d4d; /* Red color for errors */
            margin-top: 5px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Add Product</h3>
                <div class="form-container">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{ route('upload_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" required placeholder="Enter product title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required placeholder="Enter product description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" required placeholder="Enter product price" step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="category">Product Category:</label>
                            <select name="category" id="category" required>
                                <option value="">Select a category</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" required placeholder="Enter product quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional JavaScript files -->
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
