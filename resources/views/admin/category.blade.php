<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
       

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

        input[type="text"] {
            width: 350px;
            height: 35px;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn {
            padding: 8px 15px;
            background-color: #d81717;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary {
            background-color: #35dc3d;
            color: white;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #9c9899;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            color: white;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
        }

        td a {
            margin: 0 5px;
        }

        tr:nth-child(even) {
            background-color: #444;
        }

        tr:nth-child(odd) {
            background-color: #555;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Add Category</h3>
                <div class="div_deg">
                    <form action="{{ route('add_category') }}" method="post">
                        @csrf
                        <input type="text" name="category" required placeholder="Enter category name">
                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>
                <div class="div_deg">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->category_name }}</td>
                                    <td>
                                        <a href="{{ url('edit_category', $data->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('delete_category', $data->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for SweetAlert Confirmation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function confirmation(event) {
            event.preventDefault();
            let urlToRedirect = event.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure you want to delete this?",
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

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
