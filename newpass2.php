<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Hello, world!</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    <button class="btn btn-primary">
      <i class="fab fa-accessible-icon me-1"></i>Hello, world!
    </button>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- https://cdnjs.com/libraries/popper.js/2.5.4 -->
    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"
    ></script> -->

    <!-- More: https://getbootstrap.com/docs/5.0/getting-started/introduction/ -->
  </body>
</html>

<div class="container mt-5 pt-5 mb-5">
   <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4 col-xl-4">
         <div class="card p-4">
            <div class="card-body"></div>
            <div class="text-center">
               <i class="fa fa-lock" style="font-size: 100px;"font></i>
            </div>
            <form id="mainform" role="form" autocomplete="off" class="form" method="post">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-addon bg-light"><i class="fa fa-envelope-o color-blue" style="font-size: 30px; background: #e8e8e8; padding: 3px 8px;"></i></div>
                     <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required="">
                  </div>
               </div>
               <div class="form-group text-center mt-4 mb-3">
                  <input name="submit" class="btn btn-primary" value="Reset Password" type="submit">
               </div>
               <div class="text-center">
                  <h5>Forgot Password?</h5>
                  <p class="muted">Back to <a href="login.html">Log In</a></p>
               </div>
               <input type="hidden" class="hide" name="token" id="token" value=""> 
            </form>
         </div>
      </div>
   </div>
</div>
</div>