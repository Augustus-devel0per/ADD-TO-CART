<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Single Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card ticket_data">
                    <div class="card-header">
                        <h2>Single Ticket   
                            <a href="{{ route('cart.checkout') }}" style="color:black;">
                                <span style="float:right; margin-right:2em; font-size:25px">
                                    Cart: <i class="bi bi-cart4" style="font-size: 2.2rem;"></i>
                                    <span class="cart-count" style="background-color: red; color:white; border-radius:5px; padding:3px; font-size:17px; position:absolute; right:9%; top:1%;">0</span>
                                </span>
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images') }}/{{ $ticket->ticket_image }}" class="card-img-top" style="width:18rem;" alt="...">
                        <div class="shadow ticket_data" style="width: 18rem; border:1px solid #bdbdbd; padding:10px;">


                            <input type="hidden" class="ticket_id" value="{{ $ticket->id }}">
                            <input type="hidden" class="ticket_no" value="{{ $ticket->ticket_number }}">
                            <input type="hidden" class="ticket_amt" value="{{ $ticket->amount }}">


                            <h5 class="card-title">{{ $ticket->title }} #{{ $ticket->ticket_number }}</h5>
                            <p class="card-text">{{ $ticket->description }}</p> 
                            <p class="card-text">Location: {{ $ticket->location }}</p> 
                            <p class="card-text">Amount: {{ $ticket->amount }}</p> 
                            <p class="card-text">Status: {{ $ticket->status }}</p> 
                            <p class="card-text">Date: {{ $ticket->date }}</p> 
                            <div class="quantity input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="qty_input form-control text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                            <button class="btn btn-success addToCartBtn"><i class="bi bi-cart4" style="font-size: 1.3rem;"></i> ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            // ADD TO CART
            $('.addToCartBtn').click(function (e){
                e.preventDefault();

                // var data = {
                //     'ticket_id': $('.ticket_id').val(),
                //     'ticket_number': $('.ticket_no').val(),
                //     'ticket_amount': $('.ticket_amt').val(),
                //     'ticket_quantity': $('.qty_input').val()
                // }

                var ticket_id = $(this).closest('.ticket_data').find('.ticket_id').val();
                var ticket_number = $(this).closest('.ticket_data').find('.ticket_no').val();
                var ticket_amount = $(this).closest('.ticket_data').find('.ticket_amt').val();
                var ticket_quantity = $(this).closest('.ticket_data').find('.qty_input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'http://127.0.0.1:8000/insert-to-cart',
                    data: {
                        'ticket_id': ticket_id,
                        'ticket_no': ticket_number,
                        'ticket_amt': ticket_amount,
                        'ticket_qty': ticket_quantity
                    },
                    dataType: 'json',

                    success: function(response){
                        console.log(response)
                    }
                });        

                // CART QUANTITY INCREMENT BUTTON
                $(document).on('click','.increment-btn', function(e){
                    e.preventDefault();

                    var inc_value = $('.qty_input').val();
                    var value = parseInt(inc_value);
                    value = isNaN(value) ? 0 : value;
                    if(value < 20){
                        value++;
                        $('.qty_input').val(value);
                    }
                });

                // CART QUANTITY DECREMENT BUTTON
                $('.decrement-btn').click(function(e){
                    e.preventDefault();

                    var dec_value = $('.qty_input').val();
                    var value = parseInt(dec_value);
                    value = isNaN(value) ? 0 : value;
                    if(value > 1){
                        value--;
                        $('.qty_input').val(value);
                    }
                });
            }); 
        });
        







        // var ticket_id = $('.ticket_id').val();
        //         var ticket_number = $('.ticket_no').val();
        //         var ticket_amount = $('.ticket_amt').val();
        //         var ticket_quantity = $('.qty_input').val();
    </script>
</body>
</html>
