<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        input[type="text"] {
            width: 300px;
            height: 30px;
            padding: 5px;
        }

        h3 {
            color: white;
        }



        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        btn {
            height: 40px;
            padding: 5px 15px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')


    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Add Category</h3>
                <div class="div_deg">


                    <form action="{{url('add_category')}}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category">

                            <input type="submit" class="btn btn-primary " value="Add Category">
                        </div>

                    </form>
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