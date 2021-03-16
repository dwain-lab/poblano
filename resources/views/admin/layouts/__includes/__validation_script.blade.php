<script type="text/javascript">
    // jQuery.validator.setDefaults({
    //     debug: true,
    //     // success: "valid"
    // });
    $(document).ready(function() {

        $("#createForm").validate({
            rules: {
                dish: "required",
                ingredients: "required",
                menu_category_id: "required",
                heading: "required",
                point1: "required",
                file: {
                    required: true,
                    extension: "jpg|jpeg"
                },
                cost: {
                    required: true,
                    number: true,
                },
            },
            messages: {
                dish: "Dish Name required",
                ingredients: "Ingredients required",
                menu_category_id: "Category required",
                heading: "Heading required",
                point1: "Point 1 required",
                cost: {
                    required: "Price required",
                    number: "Price must be a number",
                },
                file: {
                    required: "File required",
                    extension: "File must be a file of type: jpg",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
        });

        $("#editForm").validate({
            rules: {
                dish: "required",
                ingredients: "required",
                menu_category_id: "required",
                heading: "required",
                point1: "required",
                file: {
                    extension: "jpg|jpeg"
                },
                cost: {
                    required: true,
                    number: true,
                },
            },
            messages: {
                dish: "Dish Name required",
                ingredients: "Ingredients required",
                menu_category_id: "Category required",
                heading: "Heading required",
                point1: "Point 1 required",
                cost: {
                    required: "Price required",
                    number: "Price must be a number",
                },
                file: {
                    extension: "File must be a file of type: jpg",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

        $("#eventEditForm").validate({
            rules: {
                heading: "required",
                cost: {
                    required: true,
                    number: true,
                },
                point1: "required",
                point2: "required",
                point3: "required",
                file: {
                    extension: "jpg|jpeg"
                },
            },
            messages: {
                heading: "Heading required",
                point2: "Point 2 required",
                point2: "Point 2 required",
                point3: "Point 3 required",
                file: {
                    extension: "File must be a file of type: jpg",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

        $("#specialEditForm").validate({
            rules: {
                link: "required",
                heading: "required",
                file: {
                    extension: "jpg|jpeg|png"
                },
            },
            messages: {
                heading: "Heading required",
                file: {
                    extension: "File must be a file of type: jpg, png",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

        $("#specialCreateForm").validate({
            rules: {
                link: "required",
                heading: "required",
                file: {
                    extension: "jpg|jpeg|png"
                },
            },
            messages: {
                link: "Dish Name Required",
                heading: "Heading required",
                file: {
                    extension: "File must be a file of type: jpg, png",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
        $("#galleryEditForm").validate({
            rules: {
                file: {
                    required: true,
                    extension: "jpg|jpeg"
                },
            },
            messages: {
                file: {
                    required: "Image required",
                    extension: "The file must be a file of type: jpg.",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback error");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
        });
    });

</script>
