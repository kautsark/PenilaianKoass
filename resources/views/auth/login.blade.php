<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('azzara-master/assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('azzara-master/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('azzara-master/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('azzara-master/assets/css/azzara.min.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sistem Informasi Pendidikan RS UKM</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="login-form">
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control @error ('email') is-invalid @enderror" required>
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
							@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <button type="submit" class="btn btn-primary col-md-12 float-left loginBut">Log In</button>
                    </div>
                </div>
            </form>
		</div>

		
	</div>
	<script src="{{ asset('azzara-master/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{ asset('azzara-master/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('azzara-master/assets/js/core/popper.min.js')}}"></script>
	<script src="{{ asset('azzara-master/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{ asset('azzara-master/assets/js/ready.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('azzara-master/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<script>
	
</script>
</body>
</html>


