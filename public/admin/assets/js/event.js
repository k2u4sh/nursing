$(document).ready(function(){
    $('#delEventBtn').hide();
    $('.selectAll').on('change',function() {
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        // var isChecked = $(this).is(':checked');
        if (checkedCheckboxes.length > 0)
        $('#delEventBtn').show();
        else
        $('#delEventBtn').hide();
    });
    $('#selectAll').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#event_table tbody tr').each(function() {
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
        $('#delEventBtn').show();
        else
        $('#delEventBtn').hide();
    });
    $('#eventModalClose').click(function(){
        $('#eventModal').modal('hide');
    });
    $('#openEventModal').click(function(){
        $('#eventModalLabel').html('Add Event');
        $('#update_event').hide();
        $('#desc_editor').empty();
        $('#insert_event').html('Add').show();
        $('#event_name').val('');
        $('#event_for').val('');
        $('#from_date').val('');
        $('#to_date').val('');
        $('#time').val('');
        $('#location').val('');
        var htm = '<div class="form-group"><label>Description</label><textarea name="descition" id="descition" class="form-control" rows="3"></textarea><span id="descition_error" style="color:red"></span></div>';
        $('#desc_editor').html(htm);
        CKEDITOR.replace('descition');
    });
    $('#insert_event').click(function(){
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
        $('#descition_error').html('');
        $('#event_image_error').html('');
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
        if(descition == '')
        {
            $('#descition_error').html('Please enter description');
            isValid = false;
        }
        if(event_image[0] == undefined)
        {
            $('#event_image_error').html('Please browse event image');
            isValid = false;
        }
        if(isValid)
        {
            // var data = new FormData();
            // var formData = $('#event_form').serializeArray();
            // $.each(formData, function (key, input) {
            //     data.append(input.name, input.value);
            // });
            // data.append("event_image", event_image[0]);
            var fd = new FormData();
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin-events',
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
            // var data = new FormData();
            // var formData = $('#event_form').serializeArray();
            // $.each(formData, function (key, input) {
            //     data.append(input.name, input.value);
            // });
            // data.append("event_image", event_image[0]);
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
                $('#eventModalLabel').html('Update Event');
                $('#insert_event').hide();
                $('#desc_editor').empty();
                $('#update_event').html('Update').show();
                $('#event_name').val(data.data['event_name']);
                $('#event_for').val(data.data['event_for']);
                $('#from_date').val(data.data['from_date']);
                $('#to_date').val(data.data['to_date']);
                $('#time').val(data.data['time']);
                $('#location').val(data.data['location']);
                var htm = '<div class="form-group"><label>Description</label><textarea name="descition" id="descition" class="form-control" rows="3">'+data.data['descition']+'</textarea><span id="descition_error" style="color:red"></span></div>';
                $('#desc_editor').html(htm);
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
