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
                                <h1 class="bt">Hostel
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span
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
                            <!-- <div class="mb--3">
                                <a href="#" class="active">Double occupancy</a>
                                <a href="#">Triple occupancy</a>
                                <a href="#">Quadruple occupancy</a>
                            </div> -->
                            <div class="mb--3">
                                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" id="tab-2" data-bs-toggle="pill" data-bs-target="#tab_2" role="tab"
                                    aria-controls="tab_2" aria-selected="true">Double occupancy</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-3" data-bs-toggle="pill" data-bs-target="#tab_3" role="tab"
                                    aria-controls="tab_3" aria-selected="true">Triple occupancy</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" id="tab-4" data-bs-toggle="pill" data-bs-target="#tab_4" role="tab"
                                    aria-controls="tab_4" aria-selected="true">Quadruple occupancy</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb--3 dsb-no-border">
                                <div class="fw-bold bt mb--2">{{ ucwords($mess_header->title ?? '') }}</div>

                                @foreach($mess_services as $mess_service)
                                    <div class="d-flex align-items-center justify-content-between mb--2">
                                        <div class="gt">{{ ucwords($mess_service->title ?? '') }}</div>
                                        <div class="gt">{{ isset($mess_service->from) ? Carbon\Carbon::createFromFormat('H:i:s', $mess_service->from)->format('h:i A') : '' }} to {{ isset($mess_service->to) ? Carbon\Carbon::createFromFormat('H:i:s', $mess_service->to)->format('h:i A') : '' }} </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- <a href="" class="btn-v w-100">Apply for Hostel</a> -->
                        </div>
                        <div class="col-md-9 detail-cnt-block pl-5--lg">
                            <div class="tab-content">
                                @foreach($hostel as $hos)
                                <div class="tab-pane fade {{($hos->occupacy_type == '2')?'active show':''}}" id="tab_{{$hos->occupacy_type}}" role="tabpanel" aria-labelledby="tab-{{$hos->occupacy_type}}">
                                <div>
                                    <img src="/upload/hostel/{{$hos->room_img}}" alt="" class="gap-bottom-sm"height="350px" style="width:100%" >
                                </div>
                                <h3 class="bt">Hostel</h3>
                                {!!isset($hos->room_desc)?$hos->room_desc:''!!}

                                <h3 class="bt mt--3">Recent Publications</h3>
                                <div class="vm-wrap">
                                {!!isset($hos->recent_publication)?$hos->recent_publication:''!!}
                                </div>

                                <h3 class="bt mt--3">Hostel Information</h3>
                                <div class="vm-wrap">
                                {!!isset($hos->hostel_info)?$hos->hostel_info:''!!}
                                </div>
                                </div>
                                @endforeach
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
                                            @foreach($hostel as $ho)
                                            <tr>
                                                <td class="thead-block">
                                                @if($ho->occupacy_type == '2')
                                                    Double occupancy
                                                @elseif($ho->occupacy_type == '3')
                                                    Triple occupancy
                                                @else
                                                    Quadruple occupancy
                                                @endif
                                                </td>
                                                <?php /* <td class="text-center">{{$ho->occupacy_type}}</td> */ ?>
                                                <td class="text-center">{{$ho->no_of_room}}</td>
                                                <td class="text-center">{{$ho->seat_available}}</td>
                                                <td class="text-center">{{$ho->security_deposite}}</td>
                                                <td class="text-center">{{$ho->hostel_fee}}</td>
                                                <td>INR {{(int)$ho->security_deposite + (int)$ho->hostel_fee}}/-</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <h3 class="bt mt--3">{{ ucwords($facility_header->title ?? '') }}</h3>
                                <div class="row card-block-wrap gx-5">

                                    @foreach($facilities as $facility)
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="{{ asset('facility/' .$facility->image) }}" alt="image">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <h4 class="bt"><a href="#" class="bt">{{ ucwords($facility->title ?? '') }}</a></h4>
                                                    <div class="gt text-20">{!! $facility->description ?? '' !!}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
