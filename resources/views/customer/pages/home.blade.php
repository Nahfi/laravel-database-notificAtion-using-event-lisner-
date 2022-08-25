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

</head>
<body>
      <div class="container m-auto mt-5"  style="margin-top: 200px">
            <div class="row ">
                  <div class="col-lg-6 ">
                        
<div class="container table-responsive py-5 mt-auto"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                  <button type="button" class="btn btn-info" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                     >LogOut</button>

               <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
            
            </td>
          </tr>

        </tbody>
      </table>
      <div class="row">
            <div class="col-lg-6 login-form">
                  <div class="col-lg-12 login-form">
                        @if (Session::has('message'))
                        <div class="alert alert-danger">
                            <ul>
              
                                    <li>{{ Session::get('message') }}</li>
            
                            </ul>
                        </div>
                       @endif
                    <form action="{{ route('customer.updatePassword') }}"  method="post" >
                          @csrf
                      <div class="form-group">
                        <label class="form-control-label">email</label>
                        <input type="email"name="email" class="form-control @error('email') is-invalid @enderror  ">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                       
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">OlD PASSWORD</label>
                        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" i>
                        @error('old_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">PASSWORD</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" i>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                      </div>
                    
                      <div class="form-group">
                        <label class="form-control-label">PASSWORD CONFIRM</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" i>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                      </div>
          
                      <div class="col-lg-12 loginbttm">
                        <div class="col-lg-6 login-btm login-text">
                          <!-- Error Message -->
                        </div>
                        <div class="col-lg-6 login-btm login-button">
                          <button type="submit" class="btn btn-outline-primary">UPDATE</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-12">
                    <form action="{{ route('customer.storeProduct') }}"  method="post" >
                      @csrf
                  <div class="form-group">
                    <label class="form-control-label">name</label>
                    <input type="text"name="name" class="form-control @error('email') is-invalid @enderror  ">
                      
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Quantity</label>
                    <input type="text"name="quantity" class="form-control @error('email') is-invalid @enderror  ">
                      
                  </div>

                  <div class="col-lg-12 loginbttm">
                    <div class="col-lg-6 login-btm login-text">
                      <!-- Error Message -->
                    </div>
                    <div class="col-lg-6 login-btm login-button">
                      <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                  </div>
                </form>
                  </div>

                </div>
>
      </div>
      <div class="col-lg-6">
        @foreach (auth()->user()->notifications as $notification)
        <a href="#" class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
                <div class="text-right text-muted">
                  <small>
                    @if (is_null($notification->read_at))
                      <i class="fa fa-check text-primary" aria-hidden="true"></i>
                    @else
                      <i class="fa fa-check text-danger" aria-hidden="true"></i>
                    @endif
                  </small>
                  <small>{{$notification->created_at}} ago</small>
                </div>
              </div>
              <p class="text-sm mb-0">{{ $notification->data['name']}}</p>
              <p class="text-sm mb-0">{{ $notification->data['quantity']}}</p>
        </a>
        @endforeach
      </div>
      </div>
      <div class="col-lg-12">

        <form action="{{ route('customer.serach') }}" method="get">
          {{-- @csrf --}}
          <input type="text" name="search" class="form-control" >
          <button type="submit" class="btn btn-info mt-4"  >submit</button>
        </form>
      </div>
      
                  </div>
        
              </div>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>