$(document).ready(function(){
    $('#update_testi').hide();
    //select all testimonials
    $('#delAllTesti').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#testimonial_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
    });
    $('#insert_testi').click(function(){
        var title = $('#title').val();
        var rating = $("input[name='rate']:checked").val();
        var desc = $('#testi_desc').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `/admin-testimonial`,
            method: "POST",
            data: {'title':title,'rating':rating,'desc':desc},
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
    });
    $('.testimonial_action').on('change',function(){
        var selected = $(this).find('option:selected').val();
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-testimonial-status',
            method: "POST",
            data: {'id':id,'selected':selected},
            success: function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Status Changed Successfully');
                    window.location.reload();
                }
            }
        });
    });
});
