@extends('authentication.base')

@section('title')
    Register
@endsection

@section('authentication')

    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Please Register Yourself</h3>
        </div>
        <div class="panel-body">
            <form role="form">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Re-type your password again for confirmation" name="password" type="password" value="">
                    </div>

                    <!-- Change this to a button or input when using this as a form -->
                    <a href="index.html" class="btn btn-lg btn-success btn-block">Register</a>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
