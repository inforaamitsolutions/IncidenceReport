//For Enter Number Only Validations
$('.price').keydown(function (event) {
    // Allow special chars + arrows 
    if (event.keyCode == 46 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true)
            || (event.keyCode >= 35 && event.keyCode <= 39)) {
        return;
    } else {

        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    }
});

//Can not Enter Keydown in Any Textbox
$(".no_type").keypress(function(event){
    return false;
});
base_url_dash = $("#base_url").val()
$(".app_language_select").on('click',function(){
    var lang_id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: base_url_dash + "signin/set_language",
        data: {lang_id: lang_id},
        dataType: "json",
        success: function(result){
            window.location.reload();
        }
    });
});

/**
 * 
 * open Bootstrap Model
 */
function openModel(model_id){
    $("#"+model_id).modal('show');
}