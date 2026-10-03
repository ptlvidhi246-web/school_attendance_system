document.addEventListener("DOMContentLoaded", function () {

    const forms = document.querySelectorAll("form");

    forms.forEach(function (form) {

        form.addEventListener("submit", function (event) {

            const inputs = form.querySelectorAll(
                "input[required], select[required]"
            );

            let valid = true;

            inputs.forEach(function (input) {

                if (input.value.trim() === "") {

                    valid = false;

                    input.style.border = "2px solid red";

                } else {

                    input.style.border = "1px solid #ccc";
                }

            });

            if (!valid) {

                event.preventDefault();

                alert("Please fill all required fields.");

            }

        });

    });

});