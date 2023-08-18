$(document).ready(function () {
    // Change the default messages to be the same as the server messages
    var customMessages = {
        required: jQuery.validator.format("The {0} field is required."),
        email: jQuery.validator.format("The {0} must be a valid email address."),
        url: jQuery.validator.format("The {0} must be a valid URL."),
        dateISO: jQuery.validator.format("The {0} is not a valid date."),
        number: jQuery.validator.format("The {0} must be a number."),
        digits: jQuery.validator.format("The {0} must be digits."),
        equalTo: jQuery.validator.format("The {0} and {1} must match."),
        accept: jQuery.validator.format("The {0} must be a file of type: {1}."),
        maxlength: jQuery.validator.format("The {0} must not be greater than {1} characters."),
        minlength: jQuery.validator.format("The {0} must be at least {1} characters."),
        rangelength: jQuery.validator.format("The {0} must be between {1} and {2} characters."),
        range: jQuery.validator.format("The {0} must be between {1} and {2}."),
        max: jQuery.validator.format("The {0} must not be greater than {1}."),
        min: jQuery.validator.format("The {0} must be at least {1}."),
    };

    $.extend($.validator.messages, {
        required: (param, element) => customMessages.required(getNearestLabel(element)),
        email: (param, element) => customMessages.email(getNearestLabel(element)),
        url: (param, element) => customMessages.url(getNearestLabel(element)),
        dateISO: (param, element) => customMessages.dateISO(getNearestLabel(element)),
        number: (param, element) => customMessages.number(getNearestLabel(element)),
        digits: (param, element) => customMessages.digits(getNearestLabel(element)),
        equalTo: function (param, element) {
            var equalToField = getNearestLabel($("[name=" + param.substring(1) + "]")[0]);
            return customMessages.equalTo(getNearestLabel(element), equalToField);
        },
        accept: (param, element) => customMessages.accept(getNearestLabel(element), param),
        maxlength: (param, element) => customMessages.maxlength(getNearestLabel(element), param),
        minlength: (param, element) => customMessages.minlength(getNearestLabel(element), param),
        rangelength: (param, element) => customMessages.rangelength(getNearestLabel(element), param[0], param[1]),
        range: (param, element) => customMessages.range(getNearestLabel(element), param[0], param[1]),
        max: (param, element) => customMessages.max(getNearestLabel(element), param),
        min: (param, element) => customMessages.min(getNearestLabel(element), param),
    });

    $.validator.addMethod("phoneVN", function (value, element) {
        var regex = /^(0\d{9})|(\+(84)\d{9})$/;

        return this.optional(element) || regex.test(value);
    }, (params, element) => `The ${getNearestLabel(element)} format is invalid.`);

    function getNearestLabel(element) {
        var label = $(element).closest(".field").find("label").first();

        if (label.length > 0) {
            return label.text().replace(/[\:\*]/g, "").trim().toLowerCase();
        }
        return $(element).attr("name");
    }

    function setupValidation(formId, rules) {
        $(formId).validate({
            ignore: [],
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: rules,
            errorPlacement: function (error, element) {
                // Xóa nội dung bên trong trước khi thêm
                var fieldName = element.attr("name");
                var $invalidFeedback = $("#" + fieldName + ".invalid-feedback");

                $invalidFeedback.empty();
                error.appendTo("#" + fieldName);
                $invalidFeedback.show();
            },
        });
    }

    // Authentication
    if ($("#loginForm").length > 0) {
        setupValidation("#loginForm", {
            email: {
                required: true,
                email: true
            },
            password: "required"
        });
    }

    if ($("#forgotForm").length > 0) {
        setupValidation("#forgotForm", {
            email: {
                required: true,
                email: true
            }
        });
    }

    if ($("#resetForm").length > 0) {
        setupValidation("#resetForm", {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#input_password",
            }
        });
    }

    // Banner
    if ($("#bannerCreateForm").length > 0) {
        setupValidation("#bannerCreateForm", {
            title: "required",
            image_url: "required",
            type: "required",
            date: "required",
            time: {
                required: true,
                step: false
            },
        });
        $("[name=image_url]").rules("add", {
            accept: "image/*",
        });
    }

    if ($("#bannerEditForm").length > 0) {
        setupValidation("#bannerEditForm", {
            title: "required",
            type: "required",
            date: "required",
            time: {
                required: true,
                step: false
            },
        });
        $("[name=image_url]").rules("add", {
            accept: "image/*",
        });
    }

    // Tag
    if ($("#tagCreateForm").length > 0) {
        setupValidation("#tagCreateForm", {
            name: "required",
            sort_order: "digits",
        });
    }

    if ($("#tagEditForm").length > 0) {
        setupValidation("#tagEditForm", {
            name: "required",
            sort_order: "digits",
        });
    }

    // Generals
    if ($("#generalsCreateForm").length > 0) {

        setupValidation("#generalsCreateForm", {
            contact_name: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phoneVN: true
            },
            address: "required",
            description: {
                required: true,
                maxlength: 255
            },
            logo: "required",
            fb_link: "url",
            instagram_link: "url",
            twitter_link: "url",
            linkedin_link: "url",
            youtube_link: "url",
            vimeo_link: "url",
        });

        $("[name=logo]").rules("add", {
            accept: "image/*",
        });
    }

    if ($("#generalsEditForm").length > 0) {
        setupValidation("#generalsEditForm", {
            contact_name: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phoneVN: true
            },
            address: "required",
            description: {
                required: true,
                maxlength: 255
            },
            fb_link: "url",
            instagram_link: "url",
            twitter_link: "url",
            linkedin_link: "url",
            youtube_link: "url",
            vimeo_link: "url",
        });

        $("[name=logo]").rules("add", {
            accept: "image/*",
        });
    }

    // Category
    if ($("#categoryCreateForm").length > 0) {
        setupValidation("#categoryCreateForm", {
            title: "required",
            slug: "required",
            image_url: "required",
            sort_order: "digits",
        });

        $("[name=image_url]").rules("add", {
            accept: "image/*",
        });
    }

    if ($("#categoryEditForm").length > 0) {
        setupValidation("#categoryEditForm", {
            title: "required",
            slug: "required",
            sort_order: "digits",
        });

        $("[name=image_url]").rules("add", {
            accept: "image/*",
        });
    }

    // Post
    if ($("#postCreateForm").length > 0) {
        setupValidation("#postCreateForm", {
            title: "required",
            slug: "required",
            thumbnail: "required",
            status: "required",
            date: "required",
            time: {
                required: true,
                step: false
            },
            description: "required",
            content: "required",
        });

        $("[name=thumbnail]").rules("add", {
            accept: "image/*",
        });
    }

    if ($("#postEditForm").length > 0) {
        setupValidation("#postEditForm", {
            title: "required",
            slug: "required",
            status: "required",
            date: "required",
            time: {
                required: true,
                step: false
            },
            description: "required",
            content: "required",
        });

        $("[name=thumbnail]").rules("add", {
            accept: "image/*",
        });
    }

});
