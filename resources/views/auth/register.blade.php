@extends('frontend.layouts.index')

@section('content')
<section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="signup-form">
                        <h2 align="center">Register</h2>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <input name="Username" placeholder="Username" type="text">
                            <input name="fullname" placeholder="Nama Lengkap" type="text">
                            <input name="nik" placeholder="NIK" type="text" onkeypress="validate(event)">
                            <input name="password" placeholder="Password" type="password">
                            <input name="password_confirmation" placeholder="Confirm Password" type="password" id="password-confirm" required autocomplete="new-password">
                            <div align="center">
                            <button type="submit" class="btn btn-default">Signup</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    function validate(evt) {
  var theEvent = evt || window.event;

      // Handle paste
      if (theEvent.type === 'paste') {
          key = event.clipboardData.getData('text/plain');
      } else {
      // Handle key press
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode(key);
      }
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
}
</script>
@endsection
