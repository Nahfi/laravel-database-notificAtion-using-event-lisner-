<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>DocumenCustomer login</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <style>
      body {
            background: #222D32;
            font-family: 'Roboto', sans-serif;
        }
        
        .login-box {
            margin-top: 75px;
            height: auto;
            background: #1A2226;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
        
        .login-key {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .login-title {
            margin-top: 15px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            margin-top: 15px;
            font-weight: bold;
            color: #ECF0F5;
        }
        
        .login-form {
            margin-top: 25px;
            text-align: left;
        }
        
        input[type=email] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 0px;
            color: #ECF0F5;
        }
        
        input[type=password] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            padding-left: 0px;
            margin-bottom: 20px;
            color: #ECF0F5;
        }
        
        .form-group {
            margin-bottom: 40px;
            outline: 0px;
        }
        
        .form-control:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-bottom: 2px solid #0DB8DE;
            outline: 0;
            background-color: #1A2226;
            color: #ECF0F5;
        }
        
        input:focus {
            outline: none;
            box-shadow: 0 0 0;
        }
        
        label {
            margin-bottom: 0px;
        }
        
        .form-control-label {
            font-size: 10px;
            color: #6C6C6C;
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        
        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            right: 0px;
        }
        
        .login-btm {
            float: left;
        }
        
        .login-button {
            padding-right: 0px;
            text-align: right;
            margin-bottom: 25px;
        }
        
        .login-text {
            text-align: left;
            padding-left: 0px;
            color: #A2A4A4;
        }
        
        .loginbttm {
            padding: 0px;
        }</style>
</head>
<body>
      <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-2"></div>
              <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                  <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                  ADMIN PANEL
                </div>
                @if (Session::has('message'))
                <div class="alert alert-danger">
                    <ul>
                            <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
               @endif
                <div class="col-lg-12 login-form">
                  <div class="col-lg-12 login-form">
                    <form action="{{ route('customer.SendPasswordResetLink') }}"  method="post" >
                          @csrf
                      <div class="form-group">
                        <label class="form-control-label">email</label>
                        <input type="email"name="email" class="form-control @error('email') is-invalid @enderror  ">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                       
                      </div>
                      <div class="col-lg-12 loginbttm">
                        <div class="col-lg-6 login-btm login-text">
                          <!-- Error Message -->
                        </div>
                        <div class="col-lg-6 login-btm login-button">
                          <button type="submit" class="btn btn-outline-primary">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
               
                <div class="col-lg-3 col-md-2"></div>
              </div>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>