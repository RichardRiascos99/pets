<?php require('../config/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pets | List users</title>
</head>
<body>
    <center><h1>LIST USSERS</h1></center>
    <table class="table">
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
            <th>Photo</th>
            <th>...</th>
        </tr>
        <?php
        $query_user = "
                SELECT
                    id,
                    fname,
                    email,
                    CASE WHEN status = true THEN 'Active' ELSE 'inactive'
                    END as status
                FROM
                    users";
        $result = pg_query($conn, $query_user);
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td><img src='photos/user.png' width='30'></td>";
            echo "<td>
                    <a href='g'><img src='icons/editar.png' width='20'></a>
                    <form action='delete_user.php' method='post' style='display: inline;' onsubmit='return confirmDelete()'>
                        <input type='hidden' name='userId' value='" . $row['id'] . "'>
                        <button type='submit' style='background: none; border: none; padding: 0;'>
                            <img src='icons/eliminar.png' width='20'>
                        </button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
    function confirmDelete() {
        return confirm("¿Estás seguro de eliminar este usuario?");
    }
    </script>
</body>
</html>