$(document).ready(function() {
    // Initializes Select 2
    $("#multiple-select-field").select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });

    // Hide the first option (dummy value) of select 2
    $("#multiple-select-field").on("select2:open", function () {
        // Delay until the select 2 is fully loaded
        setTimeout(function () {
            $(".select2-results__option:first-child").hide();
        }, 1);
    });
})

