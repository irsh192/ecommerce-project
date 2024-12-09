<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <title>My Cart</title>
    <style>
        /* Custom styles for the cart table */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 800px; /* Set a max-width for better appearance */
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center; /* Center text in the table */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        img {
            width: 80px; /* Set a specific width for the image */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Cover image without distortion */
        }

        .remove-btn {
            background-color: transparent;
            border: none;
            color: #e74c3c; /* Red color for the remove button */
            cursor: pointer;
            font-weight: bold;
        }

        .remove-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <div class="table-container">
            <div class="container p-5">
                <h1 class="text-2xl font-bold mb-4 text-center">My Cart</h1>
                @if ($carts->isEmpty())
                    <p>Your cart is empty.</p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->product->title }}</td>
                                    <td>
                                        <img src="{{ asset('productimage/' . $cart->product->image) }}" alt="{{ $cart->product->title }}">
                                    </td>
                                    <td>{{ $cart->product->quantity }}</td>
                                    <td>{{ number_format($cart->product->price, 2) }}</td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove-btn">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    @include('home.footer')
</body>

</html>
