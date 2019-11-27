/*
|--------------------------------------------------------------------------
| Show Driver Profile
|--------------------------------------------------------------------------
|
| Here is where you can display driver profile for your application. The
| below mentioned logic includes ajax that will dynamically load the content
| on modal.
|
*/
/*
*   Dynamic Modal
*/
$('#dynamic-content').empty();
$(document).on('click', '.custom_modal', function(e){

    var url = $(this).data("url");
    $('#dynamic-content').empty(); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader
    // alert(url);
    $.ajax({
        url: url,
        type: 'GET'
    }).done(function(data){
        // hide ajax loader
        $('#dynamic-content').empty();
        $('#modal-loader').remove();
        if(data.title)
        {
            $('#dynamic-title').html(data.title);

            $('#dynamic-content').html(data.view);
            // load response
            if(data.footer)
            {
                // $('#dynamic-footer').html(data.footer); // load response
                $( "#dynamic-footer" ).prepend(data.footer);
            }

        }else{
            $('#dynamic-content').html(data); // load response
        }
    }).fail(function(){
        $( "#dynamic-footer" ).empty();
        $('#modal-loader').remove();
        $('#dynamic-content').html('<i class="metismenu-icon pe-7s-info"></i> Something went wrong, Please try again...');
    });

});
/*
 * Copy To Clipboard
*/


function copy(that){
    //console.log(that.dataset.url);
    var inp =document.createElement('input');
    document.body.appendChild(inp);
    inp.value =that.dataset.url
    inp.select();
    console.log(document.body.appendChild(inp));
    document.execCommand('copy',false);
    inp.remove();
}


/*
*   Playback & Live Tracking Hide and show
*/

$(document).on('click', '.live_button', function(e){
    $('#dynamic-title').empty();
    $('#dynamic-title').html("Live Tracking");
    $('#share_url').css('visibility', 'visible');
    $('#share_url').css('display', 'content');
    $('#embeded_url').css('visibility', 'hidden');
    $('#embeded_url').css('display', 'none');
});

$(document).on('click', '.playback_button', function(e){
    $('#dynamic-title').empty();
    $('#dynamic-title').html("Playback");
    $('#embeded_url').css('visibility', 'visible');
    $('#embeded_url').css('display', 'content');
    $('#share_url').css('visibility', 'hidden');
    $('#share_url').css('display', 'none');
});

// Function For Masking Input fields
$(document).ready(function () {


    var val = $("#phone").val();
    if(val != null)
    {
        $("#phone").unmask();
        $("#phone").val(val).trigger("input");
        // $("#phone").mask("0Z-0ZZ-ZZZZ");
        // $('#phone').mask('0Z-0ZZ-ZZZZ', {value: $("#phone").val()} );
    }
    // vehicle model year masking
    $('#year').mask('0000');
    //  National Identity Card Masking
    $('#national_id').mask('0ZZ-0ZZZ-0ZZZZZZZ-Z', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    }, {selectOnFocus: true});
    // Date of Birth Masking
    $('#dob').mask('00/00/0000');
    $('#insurance_expiry').mask('00/00/0000');
    // License Number Masking
    $('#license_expiry_date').mask('00/00/0000');
    //Phone Number Masking
    $('#phone').mask('0Z-0ZZZZZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        },
    });

    $("#phone").on("change", function() {
        // alert('Text content changed!');
        var phone = $("#phone").val();
        $('#phone_no').val(phone);
        var phone_no = $("#phone_no").val();
        var phone_val = phone_no.replace("-", "");
        $('#phone_no').val(phone_val.replace("-", ""));
    });

    $('#phone2').mask('0Z-0ZZZZZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        },
    });

    $("#phone2").on("change", function() {
        // alert('Text content changed!');
        var phone = $("#phone2").val();
        $('#phone_no2').val(phone);
        var phone_no = $("#phone_no2").val();
        var phone_val = phone_no.replace("-", "");
        $('#phone_no2').val(phone_val.replace("-", ""));
    });
});
