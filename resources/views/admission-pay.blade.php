<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../fonts/lato/stylesheet.css">
    <link href="../css/plugin.css" rel="stylesheet">
    <link href="../css/custom-tejveer.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <div class="login-wrapp cover no-repeat payment-wrap card-sm" style="background-image: url('../img/login-bg.jpg');">
        <div class="position-relative">
            <a href="login-detail.html" class="card-cross-btn-block">
                <img src="../img/cross.png" alt="">
            </a>
            <div class="login-logo-block">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="paymentOption">
                <div class="payment-title">Application form Fee Rs. 500/-</div>
                <div class="scanner-block">
                    <img src="img/scanner.PNG" alt="">
                    <div class="scanner-title">Kindly pay online by scanning the QR Code</div>
                </div>
                <div class="disclaimer-text">
                    Disclaimer : After Successful Payment .Pease click on the below link on send email to admission.opjnursingcollege@jsw.in Including the <br> information like Transaction no ,Transaction Date and the Photo of the transaction done.
                </div>
                <a href="{{ route('payment_document') }}" class="sit btn-v red xsm rounded mt-5">Click Here
                </a>
            </div>
        </div>
    </div>
<style>
    .paymentOption .sit.btn-v.red.xsm.rounded {padding: 10px 30px;
		border-radius: .5rem !important;
	}
</style>

    <script src="../js/plugin.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
