$('.fd-carousel.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    responsiveClass:true,
    smartSpeed: 1500,
    dots: false,
    autoplay: true,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4.9,
            nav:true,
            loop:false
        }
    }
});

$('.mos-carousel.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    smartSpeed: 1500,
    autoplay: true,
    dots: false,
    responsive:{
        0:{
            items:1.5,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4.9,
            nav:true,
            loop:false
        }
    }
});

$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');


function onTabClick1(evt1) {
    setLineStyle1(evt1.target)
  }

  function setLineStyle1(tab1) {
    let line = document.querySelector('.tab-scrollable-view-1 > .line')
    line.style.left = tab1.offsetLeft + "px";
    line.style.width = tab1.clientWidth + "px";
  }


  function onTabClick2(evt2) {
    setLineStyle2(evt2.target)
  }

  function setLineStyle2(tab2) {
    let line2 = document.querySelector('.tab-scrollable-view-2 > .line')
    line2.style.left = tab2.offsetLeft + "px";
    line2.style.width = tab2.clientWidth + "px";
  }

  function onTabClick3(evt3) {
    setLineStyle3(evt3.target)
  }

  function setLineStyle3(tab3) {
    let line3 = document.querySelector('.line-start > ul > .line')
    line3.style.left = tab3.offsetLeft + "px";
    line3.style.width = tab3.clientWidth + "px";
  }


  /* bind events on load */
  window.onload = function() {
    const tabs1 = document.querySelectorAll('.tab-scrollable-view-1 > .nav > .nav-item')
    tabs1.forEach((tab1, index1) => {
      tab1.onclick = onTabClick1;

      if(index1 == 0) setLineStyle1(tab1);
    });

    const tabs2 = document.querySelectorAll('.tab-scrollable-view-2 > .nav > .nav-item')
    tabs2.forEach((tab2, index2) => {
      tab2.onclick = onTabClick2;

      if(index2 == 0) setLineStyle2(tab2);
    });

    const tabs3 = document.querySelectorAll('.line-start > .nav > .nav-item')
    tabs3.forEach((tab3, index3) => {
      tab3.onclick = onTabClick3;

      if(index3 == 0) setLineStyle3(tab3);
    });
  }

  $('.zoom-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
        verticalFit: true,
        // titleSrc: function(item) {
        //     return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
        // }
    },
    gallery: {
        enabled: true
    },
    zoom: {
        enabled: true,
        duration: 300, // don't foget to change the duration also in CSS
        opener: function(element) {
            return element.find('img');
        }
    }

});


// Show more and Less more
$('.read-more').click(function() {
    $(this).prev('.more-text').toggle();
     $(this).parent('p').toggleClass('opened');
    if ($(this).text() == "Read More...") {
      $(this).text("Read Less")
    } else {
      $(this).text("Read More...")
    }


    $(this).attr("type","current");
    var current = this;

    $(".read-more").each(function() {
      var ele = this;
      if(!ele.type){
      if ($(this).text() == "Read Less") {
        $(this).prev('.more-text').toggle();
     $(this).parent('p').toggleClass('opened');
    if ($(this).text() == "Read More...") {
      $(this).text("Read Less")
    } else {
      $(this).text("Read More...")
    }
      }
    }

    });

    $(current).attr("type","");
  });

  var colWidth = $(".grid-item").width();

window.onresize = function(){
  var colWidth = $(".grid-item").width();
}
console.log(colWidth);

var $grid = $(".grid").masonry({
  // options
  itemSelector: ".grid-item",
  columnWidth: ".grid-item",
  // percentPosition: true,
  gutter: 20,
  fitWidth: true
});

$grid.imagesLoaded().progress(function() {
  $grid.masonry("layout");
});

jQuery('.menu-close').click(function () {
  jQuery('.navbar-collapse').removeClass('show');
});

$('.hs-icon-block').click(function () {
  $('.hs-input-block').toggleClass('d-flex');
});





      $('.top-to-bottom').click(function () {
        $("html, body").animate({ scrollTop: "0" },  100);
      });

      // Select 2

	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

  if ($(window).width() < 767) {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.enquiry-now-block').addClass('d-flex');
      } else {
        $('.enquiry-now-block').removeClass('d-flex');
      }
    });
  }

  $(window).scroll(function() {
    if ($(this).scrollTop() < 30) {
      $('.top-to-bottom').addClass('d-none');
    } else {
      $('.top-to-bottom').removeClass('d-none');
    }
  });


  // Admission Form Register and Login Form
  $('.login-btn-block').click(function () {
    $('.register-form-block').addClass('d-none');
    $('.login-form-block').removeClass('d-none');
  });

  $('.register-btn-block').click(function () {
    $('.register-form-block').removeClass('d-none');
    $('.login-form-block').addClass('d-none');
  });

  // File Upload
function dragNdrop(event) {
    var previewImg = document.getElementById("file_name");
    previewImg.innerHTML = event.target.files[0].name;
}

function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
}

function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
}

//Datepicker
$(function() {
    var currentDate = new Date();
  $('input[name="dob"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    maxDate: currentDate
    // minYear: 1901,
    // autoUpdateInput: false,
  //   locale: {
  //     cancelLabel: 'Clear'
  // },
    // maxYear: parseInt(moment().format('YYYY'),10)
  });

  $('input[name="from_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    // autoUpdateInput: false,
  //   locale: {
  //     cancelLabel: 'Clear'
  // },
    // maxYear: parseInt(moment().format('YYYY'),10)
  });

  $('input[name="to_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    // autoUpdateInput: false,
  //   locale: {
  //     cancelLabel: 'Clear'
  // },
    // maxYear: parseInt(moment().format('YYYY'),10)
  });

});


$('input[name="dob"]').attr("placeholder","Enter Date of Birth");
$('input[name="from_date"]').attr("placeholder","Enter From Date");
$('input[name="to_date"]').attr("placeholder","Enter To Date");


/* Add and Delete row Educational Background */
var row1 = $(".attr-1");
var counter = 1;
function removeItem(id)
{
    $('#remove_'+id).remove();
    counter--;
}


function addRow1() {

    if(counter > 2)
    {
        alert('You have exceeded the limit');
        return false;
    }

//   row1.clone(true, true).appendTo("#attributes_1");
var htm = '<div class="row gx-5 adding-row attr attr-1" id="remove_'+counter+'">' +
          '<div class="col-md-12 label-lg d-flex align-items-center justify-content-between">' +
          '<span>Qualification <span class="quali-block">(Others)</span></span>' +
          '<a href="javascript:void(0);" class="remove remove-1" onclick="removeItem('+counter+')"><i class="fa-solid fa-trash-can"></i></a>' +
          '</div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>Qualification <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="qualification_others[]" placeholder="Enter Qualification">' +
          '</div></div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>Register No <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="other_register_no[]" placeholder="Enter Register No ">' +
          '</div></div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>Year of Passing <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="other_yr_pass[]"placeholder="Enter Year of Passing">' +
          '</div></div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>University/Board <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="other_university[]" placeholder="Enter University/Board">' +
          '</div></div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>Colledge/School <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="other_college[]" placeholder="Enter Colledge/School">' +
          '</div></div>' +
          '<div class="contact-form-block col-md-4">' +
          '<label>Grade/CGPA/Percentage <span class="red-text">*</span></label>' +
          '<div class="position-relative">' +
          '<input type="text" name="other_grade[]" placeholder="Enter Grade/CGPA/Percentage">' +
          '</div></div>' +
          '</div>';
          $("#attributes_1").append(htm);
          counter++;
}

function removeRow1(button) {
  button.closest("div.attr-1").remove();
}

$('#attributes_1 .attr-1:first-child').find('.remove-1').hide();

/* Doc ready */
$(".add-more-qualification-1").on('click', function () {
  addRow1();
  if($("#attributes_1 .attr-1").length > 1) {
    //alert("Can't remove row1.");
    $(".remove-1").show();
  }
});
$(".remove-1").on('click', function () {
  removeRow1($(this));
});


/* Add and Delete row Work Experience*/
var row2 = $(".attr-2");
var i = 1;

function addRow2() {
//   row2.clone(true, true).appendTo("#attributes_2");
    if(i > 1)
    {
        alert('You have exceeded the limit');
        return false;
    }
    var ht = '<div class="row gx-5 adding-row attr attr-2" id="rem_'+i+'">'+
             '<div class="col-md-12 label-lg d-flex align-items-center justify-content-between">'+
             '<span>Work Experience Others</span>'+
             '<a href="javascript:void(0);" class="remove remove-2" onclick="remItem('+i+')"><i class="fa-solid fa-trash-can"></i></a>'+
             '</div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>Previous Company <span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="previous_compnay_others" id="previous_compnay_others" placeholder="Enter Other Previous Company">'+
             '<span id="previous_compnay_others_error" class="red-text error-block"></span>'+
             '</div></div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>Previous Designation<span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="previous_designation_others" id="previous_designation_others" placeholder="Enter Other Previous Designation">'+
             '<span id="previous_designation_others_error" class="red-text error-block"></span>'+
             '</div></div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>From Date<span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="from_date_other" id="from_date_other" placeholder="Enter Other From Date">'+
             '<span id="from_date_other_error" class="red-text error-block"></span>'+
             '<span class="input-icon-block right no-border">'+
             '<img src="../img/calendar.png" alt="">'+
             '</span></div></div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>To Date <span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="to_date_other" id="to_date_other" placeholder="Enter Other To Date">'+
             '<span id="to_date_other_error" class="red-text error-block"></span>'+
             '<span class="input-icon-block right no-border">'+
             '<img src="../img/calendar.png" alt="">'+
             '</span></div></div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>Number of months <span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="number_of_month_other" id="number_of_month_other" placeholder="Enter Other Number of months">'+
             '<span id="number_of_month_other_error" class="red-text error-block"></span>'+
             '</div></div>'+
             '<div class="contact-form-block col-md-4">'+
             '<label>Job Description<span class="red-text">*</span></label>'+
             '<div class="position-relative">'+
             '<input type="text" name="job_description_other" id="job_description_other" placeholder="Enter Other Job Description">'+
             '<span id="job_description_other_error" class="red-text error-block"></span>'+
             '</div></div>'+
             '</div>';
             $('#attributes_2').append(ht);
             i++;
             $('input[name="from_date_other"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                });
                $('input[name="to_date_other"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                });
}
function remItem(id)
{
    $('#rem_'+id).remove();
    i--;
}

function removeRow2(button2) {
  button2.closest("div.attr-2").remove();
}

$('#attributes_2 .attr-2:first-child').find('.remove-2').hide();

/* Doc ready */
$(".add-more-qualification-2").on('click', function () {
  addRow2();
  if($("#attributes_2 .attr-2").length > 1) {
    //alert("Can't remove row2.");
    $(".remove-2").show();
  }
});
$(".remove-2").on('click', function () {
  removeRow2($(this));
});

// Admission Table File Name Show
$('.admission-table-submit').click(function () {
  $('.admission-table-file-name').removeClass('d-none');
  $('.pay-admission-fee').removeClass('gray with-disable');
  $('.admission-uload-icon-btn-block').addClass('d-none');
  $('.admission-table-hiddin-btn-block').removeClass('d-none');
});

$('.next-btn').click(function(){
//   $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
  // $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

//   $('.btnPrevious').click(function(){
//   $('.nav-tabs > .active').prev('li').find('a').trigger('click');
// });
// $(document).ready(function(){
//     var arrLen = JSON.parse($.cookie("EducationalBackground")['other_qualification']);
//     alert('Amir');
//     // console.log(arrLen);
// });
