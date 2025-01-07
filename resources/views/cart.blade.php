<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <!-- Custom CSS file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="styles.css?v=1.1">
</head>
<body>

    @extends('design.main')

    @section('main-section')
    <div class="cart-table">
        <table style="width: 80%; margin: 0 auto; font-size: 1.3rem; text-align: right;">
            <thead>
                <tr>
                    <td colspan="5">
                        <h4 style="font-size: 2rem; text-align: center;">
                            <p>Products in your cart!</p>
                        </h4>
                    </td>
                </tr>
                <tr style="font-size: 1.3rem; text-align: right;">
                    <th style="padding-right: 20px;">Image</th>
                    <th style="padding-right: 20px;">Name</th>
                    <th style="padding-right: 20px;">Points</th>
                    <th style="padding-right: 20px;">
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the JSON data passed to the view -->
                @php
                    $grand_total = 0;
                    $data = json_decode($json_data);
                    $user_id = json_decode($user_id); // Decode the JSON data passed from the controller
                @endphp

                @foreach($data as $i)
                    <tr>
                        <td>
                            <!-- Check if product_image ends with .mp3 -->
                            @if(str_ends_with($i->product_image, '.mp3'))
                                <!-- If product_image is an audio file, display the audio player -->
                                <audio controls>
                                    <source src="{{ asset('lofi/'.$i->product_image) }}" type="audio/mpeg">
                                </audio>
                            @else
                               
                                <img src="{{$i->product_image }}" alt="" width="100">
                                
                             
                            @endif
                        </td>                        
                        <td>{{ $i->product_name }}</td>
                        <td>{{ $i->product_price }}</td>
                        @php
                            $grand_total += $i->product_price;
                        @endphp
                        <td>
                            <form action="remove-from-cart?user_id={{ $user_id }}" method="POST" class="removeItem">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <input type="hidden" name="product_id" value="{{ $i->id }}">
                                <button type="submit" class="remove-item">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3">
                        <a href="home?user_id={{ $user_id }}" class="btn btn-success">
                            <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping
                        </a>
                    </td>
                    <td colspan="2"><b>Grand Total:</b>
                    <td><b>{{ $grand_total }} Points</b></td>
                    <td>
                        @if ($grand_total > 0)
                            <a href="start_book_22301483?amount={{ $grand_total }}&user_id={{ $user_id }}" class="btn btn-info">
                                <i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout
                            </a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection

</body>
</html>
