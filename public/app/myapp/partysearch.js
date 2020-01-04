
$(document).ready(function(){
    $("#partySearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#partyCodeTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
