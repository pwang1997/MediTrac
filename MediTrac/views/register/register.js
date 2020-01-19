$(document).ready(() => {
    $("#submit").click((e) => {
        e.preventDefault();
        username = $("#username");
        email = $("#email");
        password = $("#password");
        password2 = $("#password2");
        form = $("#registerForm");

        // if(username.val() === "") {
        //     if(!username.parent().parent().hasClass('has-danger')) {
        //         username.parent().parent().addClass('has-danger');
        //         username.addClass('is-invalid')
        //         username.parent().append('<div class="invalid-feedback">Username cannot be empty</div>')
        //     }
        // } else {
        //     username.parent().parent().removeClass('has-danger');
        //     username.removeClass('is-invalid');
        //     username.next().remove('.invalid-feedback');
        // }

        // if(email.val() === "") {
        //     if(!email.parent().parent().hasClass('has-danger')) {
        //         email.parent().parent().addClass('has-danger');
        //         email.addClass('is-invalid')
        //         email.parent().append('<div class="invalid-feedback">Email cannot be empty</div>')
        //     }
        // } else {
        //     email.parent().parent().removeClass('has-danger');
        //     email.removeClass('is-invalid');
        //     email.next().remove('.invalid-feedback');
        // }

        // if(password.val() === "") {
        //     if(!password.parent().parent().hasClass('has-danger')) {
        //         password.parent().parent().addClass('has-danger');
        //         password.addClass('is-invalid')
        //         password.parent().append('<div class="invalid-feedback">Passowrd cannot be empty</div>')
        //     }
        // } else {
        //     password.parent().parent().removeClass('has-danger');
        //     password.removeClass('is-invalid');
        //     password.next().remove('.invalid-feedback');
        // }

        // if(password2.val() === "") {
        //     if(!password2.parent().parent().hasClass('has-danger')) {
        //         password2.parent().parent().addClass('has-danger');
        //         password2.addClass('is-invalid')
        //         password2.parent().append('<div class="invalid-feedback">Confirm Password cannot be empty</div>')
        //     }
        // } else {
        //     password2.parent().parent().removeClass('has-danger');
        //     password2.removeClass('is-invalid');
        //     password2.parent().remove('.invalid-feedback');
        // }

        addError(username, "Username cannot be empty")
        addError(email, "Email cannot be empty")
        addError(password, "Password cannot be empty")
        addError(password2, "Confirm Password cannot be empty")

        if(password.val() !== password2.val()) {
            alert("password and confirm password must be same")
        }
    })

    function addError(selector, msg) {
        if (selector.val() === "") {
            if (!selector.parent().parent().hasClass('has-danger')) {
                selector.parent().parent().addClass('has-danger');
                selector.addClass('is-invalid')
                selector.parent().append('<div class="invalid-feedback">' + msg + '</div>')
            }
        } else {
            selector.parent().parent().removeClass('has-danger');
            selector.removeClass('is-invalid');
            selector.next().remove('.invalid-feedback');
        }
    }
});