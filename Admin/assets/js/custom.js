$(document).ready(function () {
    // Delete Rooms button
    $(document).on('click', '.delete_rooms_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'rooms_id': id,
                        'delete_rooms_btn': true
                    },
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "Rooms Deleted Successfully", "success");
                            $("#rooms_table").load(location.href + " #rooms_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
        });
    });

    // Delete Category button
    $(document).on('click', '.delete_category_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id': id,
                        'delete_category_btn': true
                    },
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "Category Deleted Successfully", "success");
                            $("#category_table").load(location.href + " #category_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
        });
    });

    // Separate the ban users and unban users event handlers
    $(document).on('click', '.ban_users_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once banned, the user will not be able to login!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willPerformAction) => {
            if (willPerformAction) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'users_id': id,
                        'ban_users_btn': true,
                    },
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "User Banned Successfully", "success");
                            // Reload the users table
                            $("#users_table").load(location.href + " #users_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.unban_users_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Do you want to unban this user?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willPerformAction) => {
            if (willPerformAction) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'users_id': id,
                        'unban_users_btn': true,
                    },
                    success: function (response) {
                        if (response == 200) {
                            swal("Success!", "User Unbanned Successfully", "success");
                            // Reload the users table
                            $("#users_table").load(location.href + " #users_table");
                        } else if (response == 500) {
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
        });
    });
});
