$(document).ready(function(){
    $('#delStripBtn').hide();

    $('.selectAll').on('change',function() {
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        // var isChecked = $(this).is(':checked');
        if (checkedCheckboxes.length > 0)
        $('#delStripBtn').show();
        else
        $('#delStripBtn').hide();
    });

    $('#selectAll').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#strip_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        // var isChecked = $(this).is(':checked');
        if (checkedCheckboxes.length > 0)
        $('#delStripBtn').show();
        else
        $('#delStripBtn').hide();
    });
    $('#stripModalClose').click(function(){
        $('#stripModal').modal('hide');
    });

    $('#openStripModal').click(function(){
        $('#stripModalLabel').html('Add Strip');
        $('#update_strip').hide();
        $('#desc_editor').empty();
        $('#insert_strip').html('Add').show();
        $('#name').val('');
        $('#count').val('');
    });

    $('#insert_strip').click(function(){
        var name = $('#name').val();
        var count = $('#count').val();
        // console.log(count);return false ;

        var isValid  = true;

        $('#name_error').html('');
        $('#count_error').html('');
        
        if(name == '')
        {
            $('#event_name_error').html('Please enter name');
            isValid = false;
        }
        if(count == '')
        {
            $('#event_for_error').html('Please enter the count');
            isValid = false;
        }
        
        if(isValid)
        {  
            var fd = new FormData();

            if(name != '')
            fd.append('name', name);

            if(count != '')
            fd.append('count', count);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/strip-store',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    if(response.status == 'success')
                    {
                        alert('Event created successfully!');
                        // $('#eventModal').modal('hide');
                        window.location.reload();
                    }
                }
            });
        }
    });
    
    $('#update_event').click(function(){
        var event_id = $('#event_id').val();
        var event_name = $('#event_name').val();
        var event_for = $('#event_for').find('option:selected').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var time = $('#time').val();
        var location = $('#location').val();
        var descition = CKEDITOR.instances['descition'].getData();
        var event_image = $('#event_image')[0].files;
        var isValid  = true;
        $('#event_name_error').html('');
        $('#event_for_error').html('');
        $('#from_date_error').html('');
        $('#to_date_error').html('');
        $('#time_error').html('');
        $('#location_error').html('');
        if(event_name == '')
        {
            $('#event_name_error').html('Please enter event name');
            isValid = false;
        }
        if(event_for == '')
        {
            $('#event_for_error').html('Please select event for');
            isValid = false;
        }
        if(from_date == '')
        {
            $('#from_date_error').html('Please choose from date');
            isValid = false;
        }
        if(to_date == '')
        {
            $('#to_date_error').html('Please choose to date');
            isValid = false;
        }
        if(time == '')
        {
            $('#time_error').html('Please choose time');
            isValid = false;
        }
        if(location == '')
        {
            $('#location_error').html('Please enter location');
            isValid = false;
        }
        if(isValid)
        {
            var fd = new FormData();
            if(event_id != '')
            fd.append('event_id',event_id);
            if(event_name != '')
            fd.append('event_name',event_name);
            if(event_for != '')
            fd.append('event_for',event_for);
            if(from_date != '')
            fd.append('from_date',from_date);
            if(to_date != '')
            fd.append('to_date',to_date);
            if(time != '')
            fd.append('time',time);
            if(location != '')
            fd.append('location',location);
            if(descition != '')
            fd.append('descition',descition);
            if(event_image[0] != undefined)
            fd.append('event_image',event_image[0]);
            $.ajax({
                url: '/update-events',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    if(response.status == 'success')
                    {
                        alert('Event updated successfully!');
                        // $('#eventModal').modal('hide');
                        window.location.reload();
                    }
                }
            });
        }
    });
});

function edit_event(id)
{
    $('#eventModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/edit-events',
        data:{'id':id},
        method: 'GET',
        success:function(data){
            if(data.status == 'success')
            {
                $('#event_id').val(data.data['id']);
                $('#eventModalLabel').html('Update Strip');
                $('#insert_strip').hide();
                $('#desc_editor').empty();
                $('#update_strip').html('Update').show();
                $('#name').val(data.data['name']);
                $('#count').val(data.data['count']);
                CKEDITOR.replace('descition');
            }
        }
    });
}
function delete_event(id)
{
    if(confirm('Are you sure, you want to delete event?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-events',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Event deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function deleteAllEvent()
{
    var deleteAll = [];
    $("input:checkbox[name=selectAll]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    // alert(deleteAll);return false;
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete all events?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-events',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Events deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
