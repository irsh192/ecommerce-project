<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        body {
            background-color: #333;
        }

        h3 {
            color: white;
            margin-top: 20px;
            text-align: center;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 300px;
            height: 35px;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
        }

        .btn {
            padding: 8px 15px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            background-color: #28a745;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Edit Category</h3>
                <div class="div_deg">
                    <form action="{{ route('update_category', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category_name" style="color:white;">Category Name:</label><br>
                            <input type="text" name="category_name" id="category_name" value="{{ $data->category_name }}" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn" value="Update Category">
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
