async function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function isValidURL(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
};
var elem = $("button#shorten")[0];
var listener = function (e) {
    // отменяем стандартное действие браузера
    e.preventDefault();
    if (isValidURL($("input[name=url]").val())) {
        $.ajax({
            url: '/shorten',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: { url: $("input[name=url]").val() },     /* Параметры передаваемые в запросе. */
            success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
                $("input[name=url]").val(data);
                $("input[name=url]").select();
                document.execCommand("copy");
                $("button#shorten").attr("id", "copy");
                $("button#copy").css("background-color", "limegreen");
                $("button#copy").text("Скопировано!");
                elem.removeEventListener('click', listener, false);
                elem.addEventListener('click', copied, false);
            }
        });
    }
    else {
        alert("Я принимаю только ссылки!");
    }
};
var copied = function (e) {
    // отменяем стандартное действие браузера
    e.preventDefault();
}
elem.addEventListener('click', listener, false);