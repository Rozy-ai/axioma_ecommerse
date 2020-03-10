$(document).on('ready', function () {
});

function Delete() {

    var key = $("[name=current-cat]").val();

    if (key)
        var isDelete = confirm("Точно удалить?");
    else
        alert('Не выбрана категория');

    if (isDelete)
        $.post("/category/admin/delete/" + key)
                .done(function (data) {
//                    alert("Data Loaded: " + data);
                });


}