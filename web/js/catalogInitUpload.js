
//run

UpdateImgList();

function afterUpload() {

    var image = $('#uploadfile-image');

    console.log(image);
    console.log(image[0].value);

    var data = {'image': image[0].value, 'object_id': object_id};
    console.log(data);

    $.post('/image/admin/add-image', data)
            .done(function (data) {
                console.log("Data Loaded: " + data);

            });

    UpdateImgList();

}

function UpdateImgList() {
    var wrap = $('#image-list');

    $.get("/image/admin/get-images?object_id=" + object_id)
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

    $.get("/image/admin/set-main?id=" + id);

    UpdateImgList();

});

// DELETE
//
$('body').on('click', '.btn-delete', function () {

    var id = $(this).attr('id');

    $.get("/image/admin/delete-image?id=" + id);

    UpdateImgList();

});

