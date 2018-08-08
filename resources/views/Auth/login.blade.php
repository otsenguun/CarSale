@extends('backend.index')

@section('content')

  <div class="login-box">
  <div class="login-logo"> <a href="index.html" class="logo"><img src="/images/logo/logo.png"></a></div>

    <div class="wrapper-page">
      <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-body">
          <h3 class="text-center m-t-0 m-b-15">
           
          </h3>
          <h4 class="text-muted text-center m-t-0">
            <strong>Sign In</strong>
          </h4>


          <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="text" required="" name="email"
                placeholder="Username" />
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="password" name="password"
                required="" placeholder="Password" />
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
             <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
            <div class="form-group text-center m-t-40">
              <div class="col-xs-12">
                <button class=
                "btn btn-primary btn-block btn-lg waves-effect waves-light"
                type="submit">Log In</button>
              </div>
            </div>
            <div class="form-group m-t-30 m-b-0">
              <div class="col-sm-7">
                <a href="{{ route('password.request') }}" class=
                "text-muted">Forgot your password?</a>
              </div>
              <div class="col-sm-5 text-right">
                <a href="/register" class=
                "text-muted">Create an account</a>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
    </div>

    @stop


 
