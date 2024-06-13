<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HT Computer - Đăng nhập</title>
	<?php
	include_once __DIR__ . '/css/style.php';
	include_once __DIR__ . '/css/trangchu.php';
	?>
	<script src="/./js/main.js" defer></script>
	<?php include_once __DIR__ . '/css/login.php' ?>
	<link rel="icon" href="/Pic/favicon.ico" type="image/x-icon">

</head>

<body>
	<?php
	include_once __DIR__ . '/bocucchinh/headder.php';
	?>
	<main>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
				<label for="tab-1" class="tab">Đăng nhập</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up">
				<label for="tab-2" class="tab">Đăng ký</label>

				<div class="login-form">
					<form class="sign-in-htm" id="login" name="login" method="post" action="./Xuly/xuly-login.php">
						<div class="group">
							<label for="user-login" class="label">Tài khoản</label>
							<input id="user-login" type="text" class="input" name="username" required>
						</div>
						<div class="group">
							<label for="pass-login" class="label">Mật khẩu</label>
							<input id="pass-login" type="password" class="input" data-type="password" name="password" required>
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Ghi nhớ đăng nhập</label>
						</div>
						<div class="group">
							<input type="submit" class="button-form" value="Đăng nhập" name="login">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot" class="fogot-pass">Quên mật khẩu?</a>
						</div>
					</form>
					<form class="sign-up-htm" id="register" name="register" method="post" action="./Xuly/xuly-login.php">
						<div class="group">
							<label for="user-register" class="label">Tài khoản</label>
							<input id="user-register" type="text" class="input" name="username" required>
						</div>
						<div class="group">
							<label for="pass-register" class="label">Mật khẩu</label>
							<input id="pass-register" type="password" class="input" data-type="password" name="password" required>
						</div>
						<div class="group">
							<label for="pass-confirm" class="label">Nhập lại mật khẩu</label>
							<input id="pass-confirm" type="password" class="input" data-type="password_confirm" name="password_confirm" required>
						</div>
						<div class="group">
							<label for="email-register" class="label">Email</label>
							<input id="email-register" type="text" class="input" name="email" required>
						</div>
						<div class="group">
							<input type="submit" class="button-form" value="Đăng ký" name="register">
						</div>
						<div class="group text-center">
							<label for="tab-1" class="tab-1">Đã có tài khoản?</label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php
	include_once __DIR__ . '/bocucchinh/footer.php';
	?>

	<script>
		function getQueryParam(param) {
			const urlParams = new URLSearchParams(window.location.search);
			return urlParams.get(param);
		}

		window.onload = function() {
			const tab = getQueryParam('tab');
			if (tab === 'login') {
				document.getElementById('tab-1').checked = true;
			} else if (tab === 'register') {
				document.getElementById('tab-2').checked = true;
			}
		}
	</script>

</body>

</html>
