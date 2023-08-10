$(document).ready(function () {
    let currentBulletinId = null;

    $(".delete-btn").click(function () {
        currentBulletinId = $(this).data("bulletin-id");
    });

    $("#confirmDelete").click(function () {
        if (currentBulletinId !== null) {
            const form = $(
                "form[data-bulletin-id='" + currentBulletinId + "']"
            );
            if (form.length > 0) {
                form.submit();
            }
        }
    });
});
