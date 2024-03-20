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
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {color: #5e5959!important;}
</style>
<body>
    <div class="login-wrapp cover no-repeat admission-login-wrap card-lg" style="background-image: url('../img/login-bg.jpg');">
        <div>
            <div class="login-logo-block">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="add-btn-block text-end">
                <a href="javascript:void(0);" class="btn-v blue rounded add-more-attchements sm" data-bs-toggle="modal" data-bs-target="#upload_more_attchment">+ Add More Attachments</a>
            </div>
            <div class="scroll-form-block scrollbar-block gap-top-md">
                <div class="table-responsive rest">
                    <table>
                        <thead>
                        <tr>
                            <!-- <th>Sr.no</th> -->
                            <th style="width: 20%;">Qualification</th>
                            <th style="width: 20%;">File Name</th>
                            <th style="width: 20%;">Last Updated</th>
                            <th style="width: 20%;">Time of Upload</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="addRow10th">
                        <!-- <tr>
                            <td>1</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name d-none">Aadhar.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue admission-uload-icon-btn-block" data-bs-toggle="modal" data-bs-target="#upload_more_attchment">
                                        <i class="fa-solid fa-upload"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="btn btn-sm blue me-2 admission-table-hiddin-btn-block d-none">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red admission-table-hiddin-btn-block d-none">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr> -->

                    </tbody>
                </table>
                </div>
                <div class="table-responsive">
                    <table><thead>
                        <tr>
                            <!-- <th>Sr.no</th> -->
                            <th style="width: 20%;">Qualification</th>
                            <th style="width: 20%;">File Name</th>
                            <th style="width: 20%;">Last Updated</th>
                            <th style="width: 20%;">Time of Upload</th>
                            <th style="width: 20%;">Action</th>
                        </tr></thead>
                        <tbody id="addRow12th">
                        <!-- <tr>
                            <td>1</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead><tr>
                            <!-- <th>Sr.no</th> -->
                            <th style="width: 20%;">Qualification</th>
                            <th style="width: 20%;">File Name</th>
                            <th style="width: 20%;">Last Updated</th>
                            <th style="width: 20%;">Time of Upload</th>
                            <th style="width: 20%;">Action</th>
                        </tr></thead>
                        <tbody id="addRowGraduation">
                        <!-- <tr>
                            <td>1</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>10th</td>
                            <td><span class="admission-table-file-name">Transfer-certificate.jpg</span></td>
                            <td>Jul 1, 2022</td>
                            <td>9:00 am</td>
                            <td>
                                <div class="actions justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-sm blue  me-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                </div>
            </div>
            <div class="btn-groups-block d-flex justify-content-end mt-5">
                <a href="{{ route('admission_pay') }}" class="btn-v rounded sm blue gray with-disable pay-admission-fee">Pay Admission Fee</a>
            </div>
        </div>
    </div>


    <div class="modal fade" id="upload_more_attchment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="login-logo-block">
                        <img src="../img/logo.png" alt="">
                    </div>
                    <form method="post" enctype="multipart/form-data" id="myForm">
                        @csrf
                    <div class="row similerText gx-5 my-4">
                        <div class="contact-form-block col-md-6">
                            <label>Select Attachment type</label>
                            <div class="position-relative">
                                <select class="select" name="attachment_type" id="attachment_type">
                                    <option value="">Select Attachment type</option>
                                    <option value="10th">10th Standard</option>
                                    <option value="12th">12th Standard</option>
                                    <option value="Graduation">Graduation</option>
                                    <!-- <option value="Post Graduation">Post Graduation</option> -->
                                </select>
                                <span id="attachment_type_error" class="red-text error-block"></span>
                            </div>
                        </div>
                        <div class="contact-form-block col-md-6">
                            <label>Attachment Name</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Enter Attachment Name" name="attachement_name" id="attachement_name">
                                <span id="attachement_name_error" class="red-text error-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="uploadOuter brows">
                        <span class="dragBox">
                            <img src="../img/folder.png" alt="" class="fplder-img-blokc">
                            <div class="drag-title">
                                Drag your documents, photos, or videos here to start uploading.
                            </div>
                            <div class="modal-or-text position-relative">OR</div>
                            <input type="file" accept="image/*" onChange="dragNdrop(event)" ondragover="drag()"
                                ondrop="drop()" id="uploadFile" name="uploadFile" />

                        </span>
                        <div class="brws-and-clk-btn-block d-flex justify-content-center flex-wrap">
                            <label for="uploadFile" class="btn-v rounded blue sm cursor-pointer">Browse files</label>
                            <div class="ulpod-file-name w-100 mt-4" id="file_name"></div>
                        </div>
                        <span id="uploadFile_err" class="red-text error-block"></span>
                    </div>
                    <div class="modal-btn-block mt-5">
                        <a href="javascript:void(0);" class="btn-v red xsm rounded admission-table-submit" id="submit_doc">Submit
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/plugin.js"></script>
    <script src="../js/main.js"></script>
    <script src="admin/assets/js/admission-detail-form.js"></script>
</body>

</html>
