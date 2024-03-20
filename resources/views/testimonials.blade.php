@include('header')
<style>
.page-header {
  text-align: center;
  font-size: 1.5em;
  font-weight: normal;
  border-bottom: 1px solid #ddd;
  margin: 30px 0
}
#pagination {
  margin: 0;
  padding: 0;
  text-align: center
}
#pagination li {
  display: inline
}
#pagination li a {
  display: inline-block;
  text-decoration: none;
  padding: 5px 10px;
  color: #000
}

/* Active and Hoverable Pagination */
#pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s
    
}
#pagination li a.active {
  background-color: #4caf50;
  color: #fff
}
#pagination li a:hover:not(.active) {
  background-color: #ddd;
} 

/* border-pagination */
.b-pagination-outer {
  width: 100%;
  margin: 0 auto;
  text-align: center;
  overflow: hidden;
  display: flex
}
#border-pagination {
  margin: 0 auto;
  padding: 0;
  text-align: center
}
#border-pagination li {
  display: inline;

}
#border-pagination li a {
  display: block;
  text-decoration: none;
  color: #000;
  padding: 5px 10px;
  border: 1px solid #ddd;
  float: left;

}
#border-pagination li a {
  -webkit-transition: background-color 0.4s;
  transition: background-color 0.4s
}
#border-pagination li a.active {
  background-color: #4caf50;
  color: #fff;
}
#border-pagination li a:hover:not(.active) {
  background: #ddd;
}
   .ratingForm .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.ratingForm .rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.ratingForm .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.ratingForm .rate:not(:checked) > label:before {
    content: '★ ';
}
.ratingForm .rate > input:checked ~ label {
    color: #ffc700;
}
.ratingForm .rate:not(:checked) > label:hover,
.ratingForm .rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.ratingForm .rate > input:checked + label:hover,
.ratingForm .rate > input:checked + label:hover ~ label,
.ratingForm .rate > input:checked ~ label:hover,
.ratingForm .rate > input:checked ~ label:hover ~ label,
.ratingForm .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.ratingForm .md-tile button{  position: absolute; right: 10px; top: 10px;font-size: 25px;
    padding: 0px 10px; top: 10px;    border: 0px solid #000;}
    .ratingForm .md-tile{margin-top: 15px;}

</style>
<section class="main-wrap sub-page-wrap">
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
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/testimonials-banner.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Testimonials
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span class="rt">Testimonials</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg testimonial-wrap gap-top-lg">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-12 mx-auto">
                            <h2 class="bt">Our Student Testimonials</h2>
                        </div>
                        
                    </div>
                    <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                            <a href="#" type="button" class="btn-v no-hover sm" data-toggle="modal" data-target="#testimonialModal">Add Testimonial</a>
                        </div>
                    </div>

                    <div class="row opt-block-wrap gap-top-md">
                        <div class="col-md-12 mx-auto">
                            <div class="grid">
                                @foreach($testimonials as $testimonial)
                                @if($testimonial->rating == '5')
                                <div class="grid-item opt-blocks lg-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !</div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    {!! $testimonial->description !!}
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/thumbnail.jpg" alt="">
                                                    </div>
                                                    @if($testimonial->name != NULL)
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">{{ $testimonial->name }}</div>
                                                        <div>{{$testimonial->occupation}}</div>
                                                    </div>
                                                    @else
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</div>
                                                        <div>Student</div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !</div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                                <div class="star-block">
                                                    @for($i = 1; $i <= $testimonial->rating ; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p>
                                                {!! $testimonial->description !!}
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/thumbnail.jpg" alt="">
                                                    </div>
                                                    @if($testimonial->name != NULL)
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">{{ $testimonial->name }}</div>
                                                        <div>{{$testimonial->occupation}}</div>
                                                    </div>
                                                    @else
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</div>
                                                        <div>Student</div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="b-pagination-outer">
@php
                            $total_page = count($allTotal);
                            $q = intdiv($total_page, 10);
                            $r = $total_page % 10;
                            if ($r != 0) {
                                $q = $q + 1;
                            }
                        @endphp

                        <ul id="border-pagination">
                            <li><a href="{{ route('testimonials_page') }}/?id=1">«</a></li>
                            @for ($i = 1; $i <= $q; $i++)
                                <li>
                                    <a href="{{ route('testimonials_page') }}/?id={{ $i }}" class="{{ $i == $active_id ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li><a href="{{ route('testimonials_page') }}/?id={{ $q }}">»</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </section>
        </section>
<!-- Modal -->
<div class="ratingForm modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="testimonialModalLabel">Add Testimonial</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="row">
                <div class="md-tile">
                    <h2 class="text-center">Add Testimonial</h2>
                    <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="cp-form">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 contact-form-block">
                            <label>Name <span class="red-text">*</span></label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Name" name="testi_name" id="testi_name">
                                    <span id="testi_name_error" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-6 contact-form-block">
                            <label>Title <span class="red-text">*</span></label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Testimonial Title" name="testi_title" id="testi_title">
                                    <span id="testi_title_error" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-12 contact-form-block">
                            <label>Occupation <span class="red-text">*</span></label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Occupation" name="testi_occu" id="testi_occu">
                                    <span id="testi_occu_error" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-12 contact-form-block">
                            <label>Rating <span class="red-text">*</span></label>
                                <div class="position-relative">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                                <span id="mobile_error" style="color:red"></span>
                            </div>
                            <div class="col-md-12 contact-form-block">
                            <label>Description <span class="red-text">*</span></label>
                                <div class="position-relative textarea-field">
                                    <textarea name="description" id="description"></textarea>
                                    <span id="description_error" style="color:red"></span>
                                    <span><span id="word_count">500</span> characters left</span>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="submit-btn w-100" id="send_testimonial">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
<!-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){
            make_ckediter();
        });

        function make_ckediter()
        {
            $("textarea").each(function(_, ckeditor) {
                var $ckfield = CKEDITOR.replace(ckeditor);

                $ckfield.on('change', function() {
                    $ckfield.updateElement();
                });
            });

        }
</script> -->
<script>
    $(document).ready(function () {
        $("#description").bind("keyup keydown", function() {
            var max = 500;
            var value = $(this).val();
            var left = max - value.length;
            if(left < 0) {
                $(this).val( value.slice(0, left) );
                left = 0;
            }
            $("#word_count").text(left);
        });
        $('[data-toggle="modal"]').click(function () {
            var target = $(this).data('target');
            $(target).modal('show');
        });
        $('#modalClose').click(function(){
            $('#testimonialModal').modal('hide');
        });
        $('#send_testimonial').click(function(){
            var name = $('#testi_name').val();
            var title = $('#testi_title').val();
            var occupation = $('#testi_occu').val();
            var rating = $("input[name='rate']:checked").val();
            var description = $('#description').val();
            var isValid = true;
            $('#testi_name_error').html('');
            $('#testi_title_error').html('');
            $('#testi_occu_error').html('');
            $('#mobile_error').html('');
            // $('#description_error').html('');
            if(name == '')
            {
                $('#testi_name_error').html('Please enter name');
                isValid = false;
            }
            if(title == '')
            {
                $('#testi_title_error').html('Please enter title');
                isValid = false;
            }
            if(occupation == '')
            {
                $('#testi_occu_error').html('Please enter occupation');
                isValid = false;
            }
            if(rating == undefined)
            {
                $('#mobile_error').html('Please give rating');
                isValid = false;
            }
            // if(description == '')
            // {
            //     $('#description_error').html('Please enter description');
            //     isValid = false;
            // }
            if(isValid)
            {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                var fd = new FormData();
                fd.append('name',name);
                fd.append('title',title);
                fd.append('occupation',occupation);
                fd.append('rating',rating);
                fd.append('description',description);
                $.ajax({
                    url: '/user-testimonial',
                    dataType: "json",
                    processData: false,
                    cache : false,
                    contentType: false,
                    data: fd,
                    method:"POST",
                    success:function(data){
                        console.log(data);
                        if(data.status == 'success')
                        {
                            alert('Testimonial submitted successfully');
                            window.location.reload();
                        }else{
                            alert('Oops something went wrong');
                        }
                    }
                });
            }
        });
    });
</script>
