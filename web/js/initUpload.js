
//run

UpdateImgList();

function afterUpload() {

    var image = $('#uploadfile-image');

    console.log(image);
    console.log(image[0].value);

    var data = {'image': image[0].value, 'object_id': object_id};
    console.log(data);

    $.post('/portfolio/admin/add-image', data)
            .done(function (data) {
                console.log("Data Loaded: " + data);

            });

    UpdateImgList();

}

function UpdateImgList() {
    var wrap = $('#image-list');

    $.get("/portfolio/admin/get-images?object_id=" + object_id)
            .done(function (data) {
//                        console.log("Data Loaded: " + data);
                wrap.html(data);
                $('#client-modal').modal('show');

            });
}

// SET MAIN
//
$('body').on('click', '.btn-setmain', function () {

    var id = $(this).attr('id');

    $.get("/portfolio/admin/set-main?id=" + id);

    UpdateImgList();

});

// DELETE
//
$('body').on('click', '.btn-delete', function () {

    var id = $(this).attr('id');

    $.get("/portfolio/admin/delete-image?id=" + id);

    UpdateImgList();

});

