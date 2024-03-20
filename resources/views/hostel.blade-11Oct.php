@include('header')
<section class="main-wrap sub-page-detail-wrap">
            <div class="hedaer-serch-wrap mobile-lg-only">
                <div class="hs-icon-block">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="hs-input-block align-items-center">
                    <input type="text" placeholder="Search For Doctors, Treatment or Faculty">
                    <a href="#" class="btn-v">Search
                        <img src="img/right-white-arrow.png" alt="">
                    </a>
                </div>
            </div>
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/departments-1.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Hostel
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
                                        class="rt">Hostel</span>
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
                            <div class="mb--3">
                                <a href="#" class="active">Double occupancy</a>
                                <a href="#">Triple occupancy</a>
                                <a href="#">Quadruple occupancy</a>
                            </div>

                            <div class="mb--3 dsb-no-border">
                                <div class="fw-bold bt mb--2">Mess Services Guidelines</div>
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">Breakfast </div>
                                    <div class="gt"> 07:00 Am to 09:00 Am </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">Tea Break </div>
                                    <div class="gt">10:30 Am to 11:00 Am</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">Lunch </div>
                                    <div class="gt">12:30 Pm to 02:30 Pm </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">Tea Break </div>
                                    <div class="gt">04:00 Pm to 05:00 Pm</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">Dinner </div>
                                    <div class="gt">07:30 Pm to 08:30 Pm</div>
                                </div>
                            </div>
                            <a href="#" class="btn-v w-100">Apply for Hostel</a>
                        </div>
                        <div class="commonUlLi col-md-9 detail-cnt-block pl-5--lg">
                            <div>
                                <img src="img/dpt-detail-1.png" alt="" class="gap-bottom-sm">
                                <h3 class="bt">Hostel</h3>
                                {!!isset($hostel[0]->room_desc)?$hostel[0]->room_desc:''!!}

                                <h3 class="bt mt--3">Rules & Regulations</h3>
                                {!!isset($hostel[0]->recent_publication)?$hostel[0]->recent_publication:''!!}

                                <h3 class="bt mt--3">Hostel Information</h3>
                                {!!isset($hostel[0]->hostel_info)?$hostel[0]->hostel_info:''!!}

                                <h3 class="bt mt--3">Semester Hostel Fees – Batch 2023-24</h3>
                                <div class="table-responsive mb--5">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="thead-block">Occupancy Type</th>
                                                <th class="thead-block text-center">No of Rooms</th>
                                                <th class="thead-block text-center">Seat Available</th>
                                                <th class="thead-block text-center">Security Deposit</th>
                                                <th class="thead-block text-center">Hostel Fee</th>
                                                <th class="thead-block">Total Payable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="thead-block">Double occupancy</td>
                                                <td class="text-center">{{isset($hostel[0]->occupacy_type)?$hostel[0]->occupacy_type:''}}</td>
                                                <td class="text-center">{{isset($hostel[0]->no_of_room)?$hostel[0]->no_of_room:''}}</td>
                                                <td class="text-center">INR {{isset($hostel[0]->security_deposite)?$hostel[0]->security_deposite:''}}/-</td>
                                                <td class="text-center">INR {{isset($hostel[0]->hostel_fee)?$hostel[0]->hostel_fee:''}}/-</td>
                                                <td>INR {{isset($hostel[0]->security_deposite)?($hostel[0]->security_deposite + $hostel[0]->hostel_fee):''}}/-</td>
                                            </tr>
                                            <tr>
                                                <td class="thead-block">Triple occupancy</td>
                                                <td class="text-center">{{isset($hostel[1]->occupacy_type)?$hostel[1]->occupacy_type:''}}</td>
                                                <td class="text-center">{{isset($hostel[1]->no_of_room)?$hostel[1]->no_of_room:''}}</td>
                                                <td class="text-center">INR {{isset($hostel[1]->security_deposite)?$hostel[1]->security_deposite:''}}/-</td>
                                                <td class="text-center">INR {{isset($hostel[1]->hostel_fee)?$hostel[1]->hostel_fee:''}}/-</td>
                                                <td>INR {{isset($hostel[1]->security_deposite)?($hostel[1]->security_deposite + $hostel[1]->hostel_fee):''}}/-</td>
                                            </tr>
                                            <tr>
                                                <td class="thead-block">Quadruple occupancy</td>
                                                <td class="text-center">{{isset($hostel[2]->occupacy_type)?$hostel[2]->occupacy_type:''}}</td>
                                                <td class="text-center">{{isset($hostel[2]->no_of_room)?$hostel[2]->no_of_room:''}}</td>
                                                <td class="text-center">INR {{isset($hostel[2]->security_deposite)?$hostel[2]->security_deposite:''}}/-</td>
                                                <td class="text-center">INR {{isset($hostel[2]->hostel_fee)?$hostel[2]->hostel_fee:''}}/-</td>
                                                <td>INR {{isset($hostel[2]->security_deposite)?($hostel[2]->security_deposite + $hostel[2]->hostel_fee):''}}/-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h3 class="bt mt--3">Facilties</h3>
                                <div class="row card-block-wrap gx-5">
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Girls Hostels</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Indoor Cineplex</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Cafes</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Hangout Zones</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Indoor Gymnasium</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                        <div>
                                            <div class="card-img-block">
                                                <img src="img/al-s-1.png" alt="">
                                            </div>
                                            <div class="card-cnt-block text-center">
                                                <h4 class="bt"><a href="service-detail.html" class="bt">Recreation Rooms</a></h4>
                                                <div class="gt text-20">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
