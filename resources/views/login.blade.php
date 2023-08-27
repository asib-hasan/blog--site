<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>   
       form {
         border: 3px solid #f1f1f1;
       }

       input[type=text], input[type=password] {
         width: 100%;
         padding: 12px 20px;
         margin: 8px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
       }

       button {
         background-color: #04AA6D;
         color: white;
         padding: 14px 20px;
         margin: 8px 0;
         border: none;
         cursor: pointer;
         width: 100%;
       }

       /* Add a hover effect for buttons */
       button:hover {
         opacity: 0.8;
       }

       /* Extra style for the cancel button (red) */
       .cancelbtn {
         width: auto;
         padding: 10px 18px;
         background-color: #f44336;
       }
       .imgcontainer {
         text-align: center;
         margin: 24px 0 12px 0;
       }

       img.avatar {
         width: 40%;
         border-radius: 50%;
       }

       /* Add padding to containers */
       .container {
         padding: 16px;
       }

       /* The "Forgot password" text */
       span.psw {
         float: right;
         padding-top: 16px;
       }


       @media screen and (max-width: 300px) {
         span.psw {
           display: block;
           float: none;
         }
         .cancelbtn {
           width: 100%;
         }
       }
</style>   
</head>    
<body>    
    <center> <h1>Login </h1> </center>   
    <form action="{{url('loginPost')}}" method="post">
       @csrf
        @if(Session::has('error'))
                    <div class="alert alert-success">
                        {{Session::get('error')}}
                    </div>
        @endif
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    
  </div>

  </form>
  <p>Didn't have any account? <a href="{{url('register')}}">Register Here</a>.</p>
</body>     
</html>  