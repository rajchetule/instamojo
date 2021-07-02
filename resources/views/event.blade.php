<!DOCTYPE html>
<html>
<head>
  <title>Instamojo Payment Gateway Integration </title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<div class="container mt-4">

<br>  <h3 class="text-center"> Instamojo Payment Gateway Integration </h3><hr>

  <div class="row">
    <div class="col-md-8">
            <form action="{{ route('pay') }}" method="POST" name="laravel_instamojo">
            {{ csrf_field() }}
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <strong>Name</strong>
                     <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <strong>Mobile Number</strong>
                     <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <strong>Email Id</strong>
                     <input type="email" name="email" class="form-control" placeholder="Enter Email id" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <strong>Event Fees</strong>
                     <input type="text" name="amount" class="form-control" placeholder="" value="200" readonly="">
                  </div>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </div>
         </form>
    </div> <!-- col // -->
  </div> <!-- row.// -->

</div>
</body>
</html>
