<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
            <a href="payment-scanner.html" class="card-cross-btn-block">
                <img src="../img/cross.png" alt="">
            </a>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gx-5 my-4">
                    <div class="contact-form-block col-md-6">
                        <div class="position-relative">
                            <input type="text" placeholder="Payment" name="payment" id="payment">
                            <span id="payment_error" class="red-text error-block"></span>
                        </div>
                    </div>
                    <div class="contact-form-block col-md-6">
                        <div class="position-relative">
                            <input type="text" placeholder="Transaction No" name="transaction_no" id="transaction_no">
                            <span id="transaction_no_error" class="red-text error-block"></span>
                        </div>
                    </div>
                    <div class="contact-form-block col-md-6">
                        <div class="position-relative">
                            <input type="text" placeholder="Transaction Date:" name="transaction_date" id="transaction_date">
                            <span id="transaction_date_error" class="red-text error-block"></span>
                        </div>
                    </div>
                </div>
                <div class="uploadOuter brows sm">
                    <span class="dragBox">
                        <img src="../img/folder.png" alt="" class="fplder-img-blokc">
                        <div class="drag-title">
                            Kindly upload the transaction you have done to our account.
                        </div>
                        <div class="modal-or-text position-relative without-modal-or-text">OR</div>
                        <input type="file" onChange="dragNdrop(event)" ondragover="drag()"
                            ondrop="drop()" id="uploadFile" name="uploadFile" />
                    </span>
                    <style>
                        .testt .error-block{text-align: center!important; margin-bottom: 20px;}
                    </style>
                    <div class="testt"><span id="uploadFile_error" class="red-text error-block"></span></div>
                    <div class="brws-and-clk-btn-block d-flex justify-content-center flex-wrap">
                        <label for="uploadFile" class="btn-v rounded blue sm cursor-pointer">Browse files</label>
                        <div class="ulpod-file-name w-100 mt-4" id="file_name"></div>
                    </div>
                </div>
                <div class="text-end">
                    <!-- <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#thankyou_message" class="btn-v red xsm rounded mt-5">Submit
                    </a> -->
                    <a href="javascript:void(0);" id="final_submit" class="btn-v red xsm rounded mt-5">Submit
                    </a>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="thankyou_message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="fw-semibold">Thank you for submitting the application your login credentials will be sent to your mail id</p>
                    <div class="modal-btn-block mt-5">
                        <!-- <a href="javascript:void(0);" class="btn-v red xsm rounded login-btn-block" data-bs-dismiss="modal">Ok
                        </a> -->
                        <a href="javascript:void(0);" class="btn-v red xsm rounded login-btn-block" id="done">Ok
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/plugin.js"></script>
    <script src="../js/main.js"></script>
    <script src="admin/assets/js/admission-detail-form.js"></script>
</body>

</html>
