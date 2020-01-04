
$(document).ready(function(){
    $("#productSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#productCodeTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
