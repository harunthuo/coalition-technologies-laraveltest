$(document).ready( () => {
    $('.save-form').on('click', () => {
        var form = $("#webpageForm");
        var formData = new FormData(form[0]);
        
        var postUrl = $("#webpageForm").attr('action');

        $('#form-errors').children('.alert').html('').css({ 'display':'none' });
        $('#form-success').children('.alert').html('').css({ 'display':'none' });

        $.ajax({
            url: postUrl,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(".save-form").html('Please wait..').css({'opacity':'0.4'});
            },
        })
        .done(function( data ) {
            $('#form-success').children('.alert').html(data.message).css({ 'display':'block', 'padding': '1rem' });

            $(".save-form").html('Save').css({'opacity':'1'});
            $(".save-form").prop('disabled', false);
			
			if( data )
			{
                var currDate = moment();
                var dateNow = currDate.format('DD-MMM-YYYY hh:mm A');

                var newRow = "<tr>"+
                "<td>" + $('#product_name').val() + "</td>" +
                "<td>" + $('#quantity').val() + "</td>" +
                "<td>" + $('#price').val() + "</td>" +
                "<td>" + dateNow + "</td>" +
                "<td>" + $('#quantity').val()*$('#price').val() + "</td>" +
                "<td>" + '<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>' + "</td>" +
                "</tr>";

                $("#product-table tbody").append(newRow);
            }

            $("#webpageForm")[0].reset();
        })
        .fail(function(data) {
            if( data.status === 422 ) 
            {
                var errorResponse = JSON.parse(data.responseText);
                
                var errors= '';
                errors += '<ul>';

                $.each( errorResponse.errors, function( key, value ) {      errors += '<li>' + value + '</li>'; 
                });
                errors += '</ul>';

                $('#form-errors').children('.alert').html(errors).css({ 'display':'block', 'padding': '1rem' });
            }
            else
            {
                $('#form-errors').children('.alert').html('There was an error. Please refresh the page and try again.').css({ 'display':'block', 'padding': '1rem' });
            }

            $(".save-form").html('Save').css({'opacity':'1'});
            $(".save-form").prop('disabled', false);
        });

        return false;
    });
});