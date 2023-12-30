$("body").on("click", "#date", function () {
    $.ajax({
        url: "/admin/get-filter-date",
        type: "GET",
        success: (res) => {
            console.log(res);
        },
    });
});
