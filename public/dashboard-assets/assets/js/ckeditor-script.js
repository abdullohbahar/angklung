var options = {
    // filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    // filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
    // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
    // filebrowserUploadMethod: 'form',
    on: {
        dialogShow: function (evt) {
            var dialog = evt.data;
            if (dialog._.name === "image2") {
                evt.data.getContentElement("info", "hasCaption").setValue(true);
            }
        },
    },
};

var editor = CKEDITOR.replace("description", options);

editor.on("required", function (evt) {
    alert("Deskripsi Harus diisi.");
    evt.cancel();
});
