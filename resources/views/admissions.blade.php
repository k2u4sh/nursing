@include('header')
<section class="main-wrap sub-page-detail-wrap">
            <!-- <div class="hedaer-serch-wrap mobile-lg-only">
                <div class="hs-icon-block">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="hs-input-block align-items-center">
                    <input type="text" placeholder="Search For Doctors, Treatment or Faculty">
                    <a href="#" class="btn-v">Search
                        <img src="img/right-white-arrow.png" alt="">
                    </a>
                </div>
            </div> -->
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/departments-1.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Admission
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span
                                        class="rt">Admission</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-top-lg gap-bottom-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 detail-sidebar-block">
                            <h5 class="bt mb--2">Applying to JSW</h5>
                            <div class="mb--3">
                                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" id="tab-1"
                                            data-bs-toggle="pill" data-bs-target="#tab_1" role="tab"
                                            aria-controls="tab_1" aria-selected="true">Admission Information</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-2" data-bs-toggle="pill"
                                            data-bs-target="#tab_2" role="tab" aria-controls="tab_2"
                                            aria-selected="false">Enquiry form</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-3" data-bs-toggle="pill"
                                            data-bs-target="#tab_3" role="tab" aria-controls="tab_3"
                                            aria-selected="false">Scholarship</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-4" data-bs-toggle="pill"
                                            data-bs-target="#tab_4" role="tab" aria-controls="tab_4"
                                            aria-selected="false">Admission form</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-5" data-bs-toggle="pill"
                                            data-bs-target="#tab_5" role="tab" aria-controls="tab_5"
                                            aria-selected="true">How to apply</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-6" data-bs-toggle="pill"
                                            data-bs-target="#tab_6" role="tab" aria-controls="tab_6"
                                            aria-selected="false">Fees structure</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-7" data-bs-toggle="pill"
                                            data-bs-target="#tab_7" role="tab" aria-controls="tab_7"
                                            aria-selected="false">Financial aid</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-8" data-bs-toggle="pill"
                                            data-bs-target="#tab_8" role="tab" aria-controls="tab_8"
                                            aria-selected="false">Why JSW</a>
                                    </li>
                                </ul>
                            </div>
                            <?php  /*
                                <a href="{{route('admission_form')}}" class="btn-v w-100">Apply for Admission</a>
                            */  ?>
                        </div>
                        <div class="col-md-9 detail-cnt-block pl-5--lg tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab-1">
                                <h3 class="bt">Overview</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis lectus elit. Sed
                                    dapibus posuere orci, eu semper turpis finibus id. Mauris aliquam, metus ac laoreet
                                    pharetra, urna nulla venenatis nisl, quis vulputate enim dui quis lorem. Fusce
                                    elementum consectetur ante eget egestas. Mauris auctor nec urna nec hendrerit.
                                    Maecenas cursus risus ac tortor suscipit imperdiet. Morbi id sapien blandit,
                                    pellentesque lorem non, efficitur ligula. Donec malesuada hendrerit lorem, eget
                                    maximus mi fermentum a. Vestibulum consequat sem eget lacinia maximus. Duis
                                    ullamcorper diam eget maximus ornare. Morbi iaculis at ex non elementum. Nullam
                                    mollis fringilla sem, a blandit lorem suscipit vel. Nunc justo nisl, sagittis nec
                                    sollicitudin id, mattis in nibh. Sed molestie, enim in elementum posuere, metus
                                    lorem pretium neque, et vehicula mauris dolor sed nulla. Ut eget lectus mauris.
                                </p>
                                <p>Integer a sapien vitae diam pharetra scelerisque. Nulla ex justo, semper in
                                    vestibulum sed, rutrum et eros. Donec suscipit arcu ac eleifend blandit. Curabitur
                                    vulputate sit amet nisi eget hendrerit. Sed in mi gravida, ullamcorper sem eget,
                                    hendrerit felis. Praesent mattis ligula ac quam mollis, ut consectetur neque
                                    fringilla. Cras aliquet, odio non sagittis dictum, lacus tellus pellentesque risus,
                                    at ultricies metus ipsum non elit. Phasellus et eros id quam rhoncus porttitor eget
                                    sit amet tellus. Sed semper gravida eros, a fringilla libero lobortis in. Ut
                                    elementum velit tellus. Quisque blandit, elit dignissim rhoncus posuere, tortor nisl
                                    consequat lectus, sed feugiat elit dolor ut purus. Sed in dapibus est. Nullam
                                    aliquet erat vel mauris pellentesque, at ultrices lorem blandit. Mauris vitae
                                    dignissim orci. Suspendisse mollis vitae diam at bibendum. Nunc enim nisl, facilisis
                                    a dapibus et, accumsan eget purus. </p>
                                <p>Mauris condimentum sodales dui sed lobortis.
                                    Proin efficitur neque suscipit consectetur vehicula. Donec suscipit aliquet ligula
                                    at accumsan. Donec vehicula faucibus libero id blandit. Duis ullamcorper euismod
                                    sapien et rhoncus. Etiam vel accumsan justo. Duis elementum, ipsum sit amet
                                    pellentesque efficitur, dui ipsum facilisis lectus, non scelerisque tellus felis
                                    aliquet nisl. Fusce ut purus at eros rutrum suscipit. Nulla efficitur nunc non odio
                                    hendrerit sodales. Proin aliquam tellus ut imperdiet maximus. Donec finibus velit
                                    lacus. In hac habitasse platea dictumst. Sed efficitur, quam id malesuada molestie,
                                    mi ligula suscipit mi, in hendrerit tellus diam blandit nunc. Cras mattis metus nec
                                    purus egestas blandit. Morbi mattis, diam sit amet tempor pellentesque, nunc metus
                                    feugiat nisi, vel posuere est neque ac magna. Integer orci urna, venenatis
                                </p>
                                <h3 class="bt mt--3">Why Choose JSW</h3>
                                <ul class="tick-list mb--3 lh-1 light">
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                </ul>



                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab-2">
                                <h3 class="bt">Or Fill The Simple Form Below And we will get in touch with you as soon
                                    as possible.</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="First Name">
                                                <img src="img/user.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Last Name">
                                                <img src="img/user.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative email-field">
                                                <input type="text" placeholder="Email">
                                                <img src="img/mail.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Mobile">
                                                <img src="img/mobile.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 contact-form-block">
                                            <div class="position-relative textarea-field">
                                                <textarea placeholder="Message"></textarea>
                                                <img src="img/comment.png" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="submit-btn w-100">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tab-3">
                                <h3 class="bt">Jsw Scholarship</h3>
                                <p>Right to Education is one of the fundamental rights of every Indian citizen. Sharda
                                    University believes that money should not be a road block for a student with
                                    innovative ideas in his mind and passion in his heart. We extend scholarships and
                                    financial assistance to meritorious students based on their academic achievements. A
                                    number of scholarships are offered to students depending on the academic credentials
                                    and their achievements in sporting and cultural arena. The University grants full to
                                    partial waiver on tuition fees payable by the student.</p>
                                <h3 class="bt">Scholarships Granted Based On Academic Merits:</h3>
                                <p>The students on their satisfactory performance in Sharda University Admission Test
                                    (SUAT), Personal Interview (PI) and depending on their merit in qualifying exams,
                                    shall be eligible for the grant of the following merit scholarships:</p>

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Bachelor of Technology (B.Tech.)
                                                <i class="fa-solid fa-plus"></i>
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="table-responsive mb--5">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="thead-block">% marks (PCM/PCB) in
                                                                    SSE <br>
                                                                    or equivalent examination</th>
                                                                <th rowspan="2" class="thead-block text-center">JEE Rank
                                                                </th>
                                                                <th colspan="3"
                                                                    class="thead-block text-center border-bottom-0">
                                                                    Scholarship (%)</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="thead-block text-center border-left-0">Gold
                                                                </th>
                                                                <th class="thead-block text-center">Gold</th>
                                                                <th class="thead-block text-center">Gold</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                PG Programme: M.Tech., M.Sc., Master of Physiotherapy, M.A., MCA &
                                                M.Design., LLM
                                                <i class="fa-solid fa-plus"></i>
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table-responsive mb--5">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="thead-block">% marks (PCM/PCB) in
                                                                    SSE <br>
                                                                    or equivalent examination</th>
                                                                <th rowspan="2" class="thead-block text-center">JEE Rank
                                                                </th>
                                                                <th colspan="3"
                                                                    class="thead-block text-center border-bottom-0">
                                                                    Scholarship (%)</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="thead-block text-center border-left-0">Gold
                                                                </th>
                                                                <th class="thead-block text-center">Gold</th>
                                                                <th class="thead-block text-center">Gold</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Innovative Idea Scholarship
                                                <i class="fa-solid fa-plus"></i>
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table-responsive mb--5">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="thead-block">% marks (PCM/PCB) in
                                                                    SSE <br>
                                                                    or equivalent examination</th>
                                                                <th rowspan="2" class="thead-block text-center">JEE Rank
                                                                </th>
                                                                <th colspan="3"
                                                                    class="thead-block text-center border-bottom-0">
                                                                    Scholarship (%)</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="thead-block text-center border-left-0">Gold
                                                                </th>
                                                                <th class="thead-block text-center">Gold</th>
                                                                <th class="thead-block text-center">Gold</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>95.00 and above</td>
                                                                <td class="text-center">Up to 25,000</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                                <td class="text-center">100</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="tab-4">
                                <h3 class="bt">Or Fill The Simple Form Below And we will get in touch with you as soon
                                    as possible.</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="First Name">
                                                <img src="img/user.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Last Name">
                                                <img src="img/user.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative email-field">
                                                <input type="text" placeholder="Email">
                                                <img src="img/mail.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Mobile">
                                                <img src="img/mobile.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <select class="select">
                                                    <option value="">Select Course</option>
                                                    <option value="">Course</option>
                                                    <option value="">Course</option>
                                                    <option value="">Course</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <select class="select">
                                                    <option value="">Select Specialization</option>
                                                    <option value="">Specialization</option>
                                                    <option value="">Specialization</option>
                                                    <option value="">Specialization</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 contact-form-block">
                                            <div class="position-relative textarea-field">
                                                <textarea placeholder="Message"></textarea>
                                                <img src="img/comment.png" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="submit-btn w-100">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </form>



                            </div>
                            <div class="tab-pane fade" id="tab_5" role="tabpanel" aria-labelledby="tab-5">
                                <h3 class="bt">How To Apply</h3>
                                <div class="accordion" id="accordionExampleHowToApply">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="hta-accordion-1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOneHTA" aria-expanded="true"
                                                aria-controls="collapseOneHTA">
                                                Online Mode Recommended for Fast Track Registration
                                                <i class="fa-solid fa-plus"></i>
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseOneHTA" class="accordion-collapse collapse show"
                                            aria-labelledby="hta-accordion-1"
                                            data-bs-parent="#accordionExampleHowToApply" style="">
                                            <div class="accordion-body">
                                                <div class="border-tabs">
                                                    <ul class="nav nav-pills mb-0" id="how-to-apply-1-pills-tab"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="tab-1"
                                                                data-bs-toggle="pill" data-bs-target="#hta_1_tab_1"
                                                                type="button" role="tab" aria-controls="hta_1_tab_1"
                                                                aria-selected="true">Step 1</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-2" data-bs-toggle="pill"
                                                                data-bs-target="#hta_1_tab_2" type="button" role="tab"
                                                                aria-controls="hta_1_tab_2" aria-selected="false">Step
                                                                2</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-3" data-bs-toggle="pill"
                                                                data-bs-target="#hta_1_tab_3" type="button" role="tab"
                                                                aria-controls="hta_1_tab_3" aria-selected="false">Step
                                                                3</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-4" data-bs-toggle="pill"
                                                                data-bs-target="#hta_1_tab_4" type="button" role="tab"
                                                                aria-controls="hta_1_tab_4" aria-selected="false">Step
                                                                4</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-5" data-bs-toggle="pill"
                                                                data-bs-target="#hta_1_tab_5" type="button" role="tab"
                                                                aria-controls="hta_1_tab_5" aria-selected="false">Step
                                                                5</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="how-to-apply-1-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="hta_1_tab_1"
                                                            role="tabpanel" aria-labelledby="hta_1_tab-1">
                                                            <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_1_tab_2" role="tabpanel"
                                                            aria-labelledby="hta_1_tab-2">
                                                            <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_1_tab_3" role="tabpanel"
                                                            aria-labelledby="hta_1_tab-3">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_1_tab_4" role="tabpanel"
                                                            aria-labelledby="hta_1_tab-4">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_1_tab_5" role="tabpanel"
                                                            aria-labelledby="hta_1_tab-5">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="hta-accordion-2">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwoHTA"
                                                aria-expanded="false" aria-controls="collapseTwoHTA">
                                                <div>
                                                    <div>
                                                        Offline Mode
                                                    </div>
                                                    <div class="fw-normal mt-4">
                                                        For offline admissions, call our support center at: 0120-4570000
                                                    </div>
                                                </div>
                                                <i class="fa-solid fa-plus"></i>
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </h2>
                                        <div id="collapseTwoHTA" class="accordion-collapse collapse"
                                            aria-labelledby="hta-accordion-2"
                                            data-bs-parent="#accordionExampleHowToApply">
                                            <div class="accordion-body">
                                                <div class="border-tabs">
                                                    <ul class="nav nav-pills mb-0" id="how-to-apply-2-pills-tab"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="tab-1"
                                                                data-bs-toggle="pill" data-bs-target="#hta_2_tab_1"
                                                                type="button" role="tab" aria-controls="hta_2_tab_1"
                                                                aria-selected="true">Step 1</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-2" data-bs-toggle="pill"
                                                                data-bs-target="#hta_2_tab_2" type="button" role="tab"
                                                                aria-controls="hta_2_tab_2" aria-selected="false">Step
                                                                2</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-3" data-bs-toggle="pill"
                                                                data-bs-target="#hta_2_tab_3" type="button" role="tab"
                                                                aria-controls="hta_2_tab_3" aria-selected="false">Step
                                                                3</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-4" data-bs-toggle="pill"
                                                                data-bs-target="#hta_2_tab_4" type="button" role="tab"
                                                                aria-controls="hta_2_tab_4" aria-selected="false">Step
                                                                4</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tab-5" data-bs-toggle="pill"
                                                                data-bs-target="#hta_2_tab_5" type="button" role="tab"
                                                                aria-controls="hta_2_tab_5" aria-selected="false">Step
                                                                5</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="how-to-apply-2-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="hta_2_tab_1"
                                                            role="tabpanel" aria-labelledby="hta_2_tab-1">
                                                            <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_2_tab_2" role="tabpanel"
                                                            aria-labelledby="hta_2_tab-2">
                                                            <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_2_tab_3" role="tabpanel"
                                                            aria-labelledby="hta_2_tab-3">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_2_tab_4" role="tabpanel"
                                                            aria-labelledby="hta_2_tab-4">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="hta_2_tab_5" role="tabpanel"
                                                            aria-labelledby="hta_2_tab-5">
                                                            <p>
                                                                Suspendisse laoreet at nulla id auctor. Maecenas in dui
                                                                cursus, lacinia nisl non, blandit lorem. Aliquam vel
                                                                risus hendrerit, faucibus nisl a, porta sapien. Etiam
                                                                iaculis mattis quam, nec iaculis velit feugiat quis.
                                                                Pellentesque sed feugiat dui, ac euismod Leo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane fade" id="tab_6" role="tabpanel" aria-labelledby="tab-6">
                                <h3 class="bt">Fee Structure For Previous Year Students</h3>
                                <div class="mb-4 gt">
                                    <a href="#" class="bt underline fw-bold">Click here</a> to view the Fee Structure for Previous Year Students 2022
                                </div>
                                <div class="mb-4 gt">
                                    <a href="#" class="bt underline fw-bold">Click here</a> to view the Fee Structure for Previous Year Students 2021
                                </div>
                                <div class="mb-4 gt">
                                    <a href="#" class="bt underline fw-bold">Click here</a> to view the Fee Structure for Previous Year Students 2020
                                </div>


                            </div>
                            <div class="tab-pane fade" id="tab_7" role="tabpanel" aria-labelledby="tab-7">
                                <h3 class="bt">Jsw University Admission Test- 2023 Process Details At Exam Centres</h3>
                                <ul class="tick-list mb--3 lh-1 light">
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                </ul>
                                <h3 class="bt mt--3">Guidelines For Admissions</h3>
                                <ul class="tick-list mb--3 lh-1 light">
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                </ul>



                            </div>
                            <div class="tab-pane fade" id="tab_8" role="tabpanel" aria-labelledby="tab-8">
                                <h3 class="bt">Why Jsw</h3>
                                <ul class="tick-list mb--3 lh-1 light">
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                </ul>
                                <h3 class="bt mt--3">Jsw Advantages</h3>
                                <ul class="tick-list mb--3 lh-1 light">
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                    <li>
                                        Lorem ipsum sit amet, consectetur adipiscing elit. Nullam odio nisi, maximus
                                        mollis dui in, lacinia vehicula eros. Donec dictum.
                                    </li>
                                </ul>



                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
