<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>productpage</title>

	<style>
		body {
			padding: 60px 0;
		}

		.container-fluid {
			max-width: 1140px;
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<form action="{{ route('paymentlist') }}" method="post">
		@csrf
		<input type="hidden" value="45" name="price">
		<button type="submit" class="btn btn-success">
			Add to cart
		</button>
	</form>

</body>

</html>