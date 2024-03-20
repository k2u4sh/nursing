$(document).ready(function(){
    $('#update_testi').hide();
    $('#modalClose').click(function(){
        $('#testimonialViewModal').modal('hide');
    });
    //select all testimonials
    // $('#delAllTesti').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#testimonial_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    $('#delTestiBtn').hide();
    $('.delAllTesti').on('change',function() {
        var checkedCheckboxes = [];
        $(".delAllTesti").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delTestiBtn').show();
        else
        $('#delTestiBtn').hide();
    });
    $('#delAllTesti').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#testimonial_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".delAllTesti").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delTestiBtn').show();
        else
        $('#delTestiBtn').hide();
    });
    //insert testimonial
    $('#insert_testi').click(function(){
        var title = $('#title').val();
        var testi_name1 = $('#testi_name1').val();
        var occupation = $('#testi_occu').val();
        var rating = $("input[name='rate']:checked").val();
        var desc = $('#testi_desc').val();
        isValid = true;
        $('#title_error').html('');
        $('#testi_name1_error').html('');
        $('#testi_occu_error').html('');
        if(title == '')
        {
            $('#title_error').html('Please enter title');
            isValid = false;
        }
        if(testi_name1 == '')
        {
            $('#testi_name1_error').html('Please enter name');
            isValid = false;
        }
        if(occupation == '')
        {
            $('#testi_occu_error').html('Please enter occupation');
            isValid = false;
        }
        if(isValid)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/admin-testimonial`,
                method: "POST",
                data: {'title':title, 'testi_name1':testi_name1, 'occupation':occupation, 'rating':rating,'desc':desc},
                success: function(data)
                {
                    console.log(data);
                    if(data.status == 'success')
                    {
                        alert('Testimonial Added Successfully');
                        window.location.reload();
                    }
                }
            });
        }
    });

    $('.testimonial_action').on('change', function(event) {
        var val = $(this).val();
        var id = $(this).data("id");
        if (val == '0') {
            if(confirm('Are you sure, you want to publish it')) {
                toggle(id);
            } else {
                event.preventDefault(); 
                $(this).prop('checked', !$(this).prop('checked')); 
            }
        } else if(val == '1') {
            if(confirm('Are you sure, you want to unpublish it')) {
                toggle(id);
            } else {
                event.preventDefault(); 
                $(this).prop('checked', !$(this).prop('checked')); 
            }
        }
    });

    // $('.testimonial_action').on('change',function(){
    //     var val = $(this).val();
    //     var id = $(this).data("id");
    //     if (val == '0') {
    //         if(confirm('Are you sure, you want to publish it'))
    //         {
    //             toggle(id);
    //         }
    //     }else if(val == '1'){
    //         if(confirm('Are you sure, you want to unpublish it'))
    //         {
    //             toggle(id);
    //         }
    //     }
    // });


    // $('.testimonial_action').on('change',function(){
    //     var val = $(this).val();
    //     if(val == '0')
    //     var selected = $(this).data("id");//$(this).find('option:selected').val();
    //     var id = $(this).data("id");
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '/admin-testimonial-status',
    //         method: "POST",
    //         data: {'id':id,'selected':selected},
    //         success: function(data){
    //             console.log(data);
    //             if(data.status == 'success'){
    //                 alert('Status Changed Successfully');
    //                 window.location.reload();
    //             }
    //         }
    //     });
    // });
});
function toggle(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-testimonial-status',
        method: "POST",
        data: {'id':id},
        success: function(data){
            console.log(data);
            if(data.status == 'success'){
                alert('Status Changed Successfully');
                window.location.reload();
            }
        }
    });
}
function view_testimonial(id)
{
    $('#testimonialViewModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/view-testimonial/?id='+id,
        method: "GET",
        Data: {'id':id},
        success: function(data)
        {
            if(data.status == 'success')
            {
                $('#viewTitle').html(data.data['title']);
                $('#viewName').html(data.data['name']);
                $('#viewOccupation').html(data.data['occupation']);
                $('#viewRating').html(data.data['rating']+' Star');
                $('#viewDescription').html(data.data['description']);
            }
        }
    });
}
function delete_testimonial(id)
{
    if(confirm('Are you sure to delete testimonial?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-testimonial',
            method: 'POST',
            data: {'id':id},
            success: function(data)
            {
                if(data.status == 'success')
                {
                    alert('Testimonial Deleted Successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function delAllTesti()
{
    var deleteAll = [];
    $("input:checkbox[name=delAllTesti]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete testimonials?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-testimonial',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('testimonials deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
