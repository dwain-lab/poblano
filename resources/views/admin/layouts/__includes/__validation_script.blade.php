<script type="text/javascript">
    // jQuery.validator.setDefaults({
    //     debug: true,
    //     // success: "valid"
    // });
    $(document).ready(function() {

        $("#createForm").validate({
            rules: {
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
                heading: "Heading required",
                point1: "Point 1 required",
                cost: {
                    required: "Price required",
                    number: "Enter valid number",
                },
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

        $("#editForm").validate({
            rules: {
                heading: "required",
                point1: "required",
            },
            messages: {
                heading: "Heading required",
                point1: "Point 1 required",
            },
            submitHandler: function(form) {
                form.submit();
            },
            errorElement: "span",
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
    });

</script>
