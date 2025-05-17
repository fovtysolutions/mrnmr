<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style>
		.it-error-area {
			text-align: center;
		}

		.it-error-content {
			text-align: center;
		}
		.it-error-content h5 {
			font-weight: 700;
			font-size: 42px;
			line-height: 1.25;
			color: #002d77;
			margin: 10px;
		}

		.it-error-content p {
			color: #5f6168;
			font-weight: 400;
			font-size: 18px;
			margin: 20px;
		}

		.error-btn {
			margin-top: 40px;

		}
		.error-btn a{
			background-color: #ff6825;
			color: #fff;
			padding: 10px 20px;
			border-radius: 2px;
			text-decoration: none;
			margin-top: 10px;

		}
	</style>
</head>

<body>
	<div class="it-error-area py-2">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12 col-xl-7 col-lg-7 col-md-9">
					<div class="it-error-thumb mb-40">
						<img src="<?php echo base_url('assets/img/error/error.gif') ?>" alt="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="it-error-content">
						<h5>
							Oops! That page can’t be found.
						</h5>
						<p>
							Oops! The page you are looking for does not exist. It
							might have <br />
							been moved or deleted. Please check and try again.
						</p>
						<div class="error-btn">
							<a href="<?php echo base_url('/dashboard') ?>"> Back to Home </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>