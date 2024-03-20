$(document).ready(function(){
    $('#modalClose').click(function(){
        $('#holidayModal').modal('hide');
    });
    $('#update_holiday').hide();
    $('#openHolidayModal').click(function(){
        $('#holidayModalLabel').html('Add Holiday');
        $('#update_holiday').hide();
        $('#add_holiday').show();
        $('#holiday_name').val('');
        $('#holiday_type').val('');
        $('#day').val('');
        $('#h_date').val('');
    });
    $('#add_holiday').click(function(){
        var holiday_name = $('#holiday_name').val();
        var holiday_type = $('#holiday_type').find(":selected").val();
        var day = $('#day').find(":selected").val();
        var h_date = $('#h_date').val();
        $('#holiday_name_error').html('');
        $('#holiday_type_error').html('');
        $('#day_error').html('');
        $('#date_error').html('');
        if(holiday_name == '')
        {
            $('#holiday_name_error').html('Please enter holiday name');
            return false;
        }
        if(holiday_type == '')
        {
            $('#holiday_type_error').html('Please select holiday type');
            return false;
        }
        if(day == '')
        {
            $('#day_error').html('Please select day');
            return false;
        }
        if(h_date == '')
        {
            $('#date_error').html('Please select date');
            return false;
        }
        var fd = new FormData();
        fd.append('holiday_name',holiday_name);
        fd.append('holiday_type',holiday_type);
        fd.append('day',day);
        fd.append('h_date',h_date);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-holiday',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                // console.log(data);
                if(data.status == 'success'){
                    alert('Holiday Added Successfully');
                    window.location.replace('/admin-holiday');
                }
            }
        });
    });
    $('#update_holiday').click(function(){
        var form_id = $('#form_id').val();
        var holiday_name = $('#holiday_name').val();
        var holiday_type = $('#holiday_type').find(":selected").val();
        var day = $('#day').find(":selected").val();
        var h_date = $('#h_date').val();
        $('#holiday_name_error').html('');
        $('#holiday_type_error').html('');
        $('#day_error').html('');
        $('#date_error').html('');
        if(holiday_name == '')
        {
            $('#holiday_name_error').html('Please enter holiday name');
            return false;
        }
        if(holiday_type == '')
        {
            $('#holiday_type_error').html('Please select holiday type');
            return false;
        }
        if(day == '')
        {
            $('#day_error').html('Please select day');
            return false;
        }
        if(h_date == '')
        {
            $('#date_error').html('Please select date');
            return false;
        }
        var fd = new FormData();
        fd.append('id',form_id);
        fd.append('holiday_name',holiday_name);
        fd.append('holiday_type',holiday_type);
        fd.append('day',day);
        fd.append('h_date',h_date);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-update-holiday',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                // console.log(data);
                if(data.status == 'success'){
                    alert('Holiday Updated Successfully');
                    window.location.replace('/admin-holiday');
                }
            }
        });
    });
});
function edit_holiday(id)
{
    $('#holidayModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-edit-holiday',
        data: {'id':id},
        method: 'GET',
        success: function(data)
        {
            console.log(data.holiday[0])
            $('#add_holiday').hide();
            $('#update_holiday').html('Update').show();
            $('#holidayModalLabel').html('Update Holiday');
            $('#holiday_name').val(data.holiday[0]['holiday_name']);
            $('#form_id').val(data.holiday[0]['id']);
            $('#day').empty();
            $('#holiday_type').empty();
            $('#day').append('<option value="">Select Day</option>');
            var html = '<option value="Monday"' + (data.holiday[0]['day'] === 'Monday' ? ' selected' : '') + '>Monday</option>' +
                       '<option value="Tuesday"' + (data.holiday[0]['day'] === 'Tuesday' ? ' selected' : '') + '>Tuesday</option>' +
                       '<option value="Wednesday"' + (data.holiday[0]['day'] === 'Wednesday' ? ' selected' : '') + '>Wednesday</option>' +
                       '<option value="Thursday"' + (data.holiday[0]['day'] === 'Thursday' ? ' selected' : '') + '>Thursday</option>' +
                       '<option value="Friday"' + (data.holiday[0]['day'] === 'Friday' ? ' selected' : '') + '>Friday</option>' +
                       '<option value="Saturday"' + (data.holiday[0]['day'] === 'Saturday' ? ' selected' : '') + '>Saturday</option>' +
                       '<option value="Sunday"' + (data.holiday[0]['day'] === 'Sunday' ? ' selected' : '') + '>Sunday</option>';
            $('#day').append(html);
            var htm = '<option value="">Select Holiday Type</option>' +
                      '<option value="National Holiday"' + (data.holiday[0]['holiday_type'] === 'National Holiday' ? 'selected' : '') + '>Nationa Holiday</option>' +
                      '<option value="Public Holiday"' + (data.holiday[0]['holiday_type'] === 'Public Holiday' ? 'selected' : '') + '>Public Holiday</option>' +
                      '<option value="College Holiday"' + (data.holiday[0]['holiday_type'] === 'College Holiday' ? 'selected' : '') + '>College Holiday</option>' +
                      '<option value="Semester Leave"' + (data.holiday[0]['holiday_type'] === 'Semester Leave' ? 'selected' : '') + '>Semester Leave</option>';
            $('#holiday_type').append(htm);
            $('#h_date').val(data.holiday[0]['date']);
        }
    });
}
function delete_holiday(id)
{
    if(confirm('Are you sure to delete'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-delete-holiday',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Holiday deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
