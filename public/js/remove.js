function getCookie(name) {
    let matches = document.cookie.match(
        new RegExp(
            "(?:^|; )" +
                name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
                "=([^;]*)"
        )
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options = {}) {
    options = {
        path: "/",
        // при необходимости добавьте другие значения по умолчанию
        ...options,
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie =
        encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}

function commitCart() {
    setCookie("data", 0, { "max-age": 86400 * 30 });
    updateTotalPrice();
}

$(document).ready(function () {
    $(".remove").click(function (event) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        cart = JSON.parse(getCookie("data"));
        console.log(cart);

        var pVal = $("#" + event.target.id).attr("name");
        console.log(pVal);
        //window.location.reload(true);
        //location.reload(true);
        $.ajax({
            url: "remove",
            method: "POST",
            cache: false,
            data: {
                pVal: pVal,
            },
            dataType: "text",
            success: function (response) {
                commitCart();
            },
        });
    });
});
