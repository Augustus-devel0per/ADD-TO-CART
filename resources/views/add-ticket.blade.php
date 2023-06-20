<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Purchase Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Create a Ticket</h2> <a href="{{ route('ticket.get') }}" class="btn btn-info">View Tickets</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ticket.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('created') }}  
                                </div>      
                            @endif
                            <div class="mb-3"> 
                              <label for="Title" class="form-label">Event Title</label>
                              <input type="text" name="event_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Description" class="form-label">Event Description</label>
                                <textarea name="event_description" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Date" class="form-label">Event Date</label> 
                                <input type="date" name="event_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Location" class="form-label">Event Location</label>
                                <input type="text" name="event_location" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Amount" class="form-label">Event Amount</label>
                                <input type="text" name="event_amount" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="form-label">Event Status</label>
                                <select name="event_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Location" class="form-label">Event Image</label>
                                <input type="file" name="event_image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Create Ticket</button>
                          </form>
                    </div>
                </div>
            </div>
          </div>
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>