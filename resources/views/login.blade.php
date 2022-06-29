@extends('master')

@section('content')

            
     <div class="container custom-login" >
         <div class="row">
            <div class="col-sm-4 col-sm-offset">
                <form class="form" action=" login" method="POST">
                    <h1 class="bg-danger text-light card-header">Login Form</h1>
                    <table class="table table-hover table-striped">
                               @csrf
                        <tr>
                        <td>email:</td>
                        <td> <input type="email" name="email" placeholder="enter your email"></td>
                        </tr>
                        
                        <tr>
                        <td>Password:</td>
                        <td> <input type="password" name="password" placeholder="enter your password"></td><br>
                        </tr>
                        <tr>
                            <td><button class="btn btn-outline-success">LOGIN</button></td>
                        </tr>
                    </table>
                </form>
            </div>
         </div>
    </div>
                
@endsection