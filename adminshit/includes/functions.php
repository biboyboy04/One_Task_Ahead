<?php
//diplay users 
function displayUsers($conn)
{
    $sql = "SELECT users.id, users.first_name, users.last_name, users.username, users.email, permission.role
            FROM users
            INNER JOIN permission ON users.access_lvl = permission.perm_id;";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $user) {
        echo "<tr>";
        echo "<td> " . $user['id'] . "</td> ";
        echo "<td> " . $user['first_name'] . " " . $user['last_name'] . "</td> ";
        echo "<td> " . $user['username'] . "</td> ";
        echo "<td> " . $user['email'] . "</td> ";
        echo "<td> " . $user['role'] . "</td> ";
        echo "<td> <button>Edit</button></td>";
        echo "<td> <button> Delete </button></td>";
        echo "</tr>";
    }
}


function totalUsers($conn)
{

    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $count  = mysqli_num_rows($result);
    return $count;
}


//templates 
function displaytemps($conn)
{
    $sql = "SELECT template.template_id, template.temp_name, category.categ_name, COUNT(task.temp_id) AS task_count
            FROM template
            INNER JOIN category ON template.categ_id = category.categ_id
            LEFT JOIN task ON template.template_id = task.temp_id
            GROUP BY template.template_id;";
    
    $result = mysqli_query($conn, $sql);

    foreach ($result as $template) {
        echo "<tr>";
        echo "<td> " . $template['template_id'] . "</td> ";
        echo "<td> " . $template['temp_name'] . "</td> ";
        echo "<td> " . $template['categ_name'] . "</td> ";
        echo "<td> " . $template['task_count'] . "</td> ";
        echo "<td> <button>Edit</button></td>";
        echo "<td> <button> Delete </button></td>";
        echo "</tr>";
    }
}


