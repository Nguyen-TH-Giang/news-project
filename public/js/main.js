ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

const SlugTaxonomy = {
    /**
     * Change string to slug.
     *
     * @param mixed $str
     * @return slug
     */
    stringToSlug: function (str) {
        str = str.replace(/^\s+|\s+$/g, ""); // trim
        str = str.toLowerCase();

        // Change accented vietnamese to unsigned vietnamese
        let from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ";
        let to = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyd";
        for (let i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
        }

        str = str
            .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
            .replace(/\s+/g, "-"); // collapse whitespace and replace by -

        return str;
    },

    /**
     * Create slug form name
     */
    generateSlug: function () {
        $("#title").on("keyup", function () {
            let name = $("#title").val();
            let slugOfTaxonomy = SlugTaxonomy.stringToSlug(name);
            $("#slug").val(slugOfTaxonomy);
        });
    },
    init: function () {
        SlugTaxonomy.generateSlug();
    },
};

$(document).ready(function () {
    SlugTaxonomy.init();
});

// Set timeout flash message
document.addEventListener('DOMContentLoaded', function () {
    const flashMessage = document.querySelector("#flash-message");
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.classList.add('hide'); // Add 'hide' class to initiate the fade out
            flashMessage.addEventListener('transitionend', function () {
                flashMessage.remove();
            });
        }, 5000);
    }
})

$(document).ready(function () {
    // Catch the click event on the sign-out link
    $('#sign-out-link').click(function (event) {
        // Prevent the default action of the anchor tag
        event.preventDefault();

        // Submit the logout form
        $('#logout-form').submit();
    });
});

