<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TEST PHP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff5f7; /* soft pink background */
        }
        h2 {
            color: #d63384; /* pink title */
            font-weight: bold;
        }
        .table-custom {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.2);
        }
        .table-custom thead {
            background-color: #f8d7e9; /* light pink header */
            color: #a61c6e;
        }
        .table-custom tbody tr:hover {
            background-color: #ffe6f1; /* soft hover effect */
        }
        .alert-custom {
            background-color: #fce4ec;
            color: #c2185b;
            border: 1px solid #f8bbd0;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">DAFTAR PRODUK</h2>

    <?php
    include "db.php";

    $query = "SELECT * FROM products";
    $result = $connection->query($query);

    if (!$result) {
        die("<div class='alert alert-custom text-center'>Query gagal: " . $connection->error . "</div>");
    }

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-hover table-custom'>";
        echo "<thead><tr>";

        
        $fields = $result->fetch_fields();
        foreach ($fields as $f) {
            echo "<th>" . htmlspecialchars($f->name) . "</th>";
        }
        echo "</tr></thead><tbody>";

        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($fields as $f) {
                $val = isset($row[$f->name]) ? $row[$f->name] : '';
                echo "<td>" . htmlspecialchars((string)$val) . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-custom text-center'>Tidak ada data.</div>";
    }

    $connection->close();
    ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
