
function validateRegistrationForm(login = 0) {
    var error = "";
    $(".error-div").fadeOut();
    $(".input").each(function (index, el) {
        if ($(el).val() == "")
            error += ("<li> * " + $(el).attr("label-name") + " is required </li>");

        if ($(el).attr("id") == "password" && $(el).val().length < 8)
            error += ("<li> * The password must be at least 8 characters. </li>");
    });
    if (login != 0) {
        if ($("#agree-term").is(':checked') == false)
            error += ("<li> * " + $("#agree-term").attr("label-name") + " is required </li>");
        if ($("#password").val() != $("#password_confirmation").val())
            error += ("<li> * The password confirmation does not match.</li>");
    }

    if (error.length == 0)
        $("#register-form").submit();
    else {
        $(".list-unstyled").html(error);
        $(".error-div").fadeIn();
    }
}