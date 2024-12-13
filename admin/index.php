<!DOCTYPE html>
<html>
    <head>
        <title>Burger Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">   
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="bi-shop"></span> Burger Admin <span class="bi-shop"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!--<tr>
                      <td>Nom1</td>
                      <td>Description1</td>
                      <td>Prix1</td>
                      <td>Catégorie1</td>
                      <td width 150>
                      <a class="btn btn-secondary" href="view.php?id=1"><span class="bi-eye"></span> Voir</a>
                      <a class="btn btn-primary" href="update.php?id=1"><span class="bi-pencil"></span> Modifier</a>
                      <a class="btn btn-danger" href="delete.php?id=1"><span class="bi-x"></span> Supprimer</a>
                      </td>
                    </tr>-->
                     <!---->
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category
                        FROM burger_code.items LEFT JOIN burger_code.categories ON items.category = categories.id 
                        ORDER BY items.id DESC');
                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['name'] . '</td>';
                            echo '<td>'. $item['description'] . '</td>';
                            echo '<td>'. number_format($item['price'], 2, '.', '') . '</td>';
                            echo '<td>'. $item['category'] . '</td>';
                            echo '<td width=340>';
                            echo '<a class="btn btn-secondary" href="view.php?id='.$item['id'].'"><span class="bi-eye"></span> Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"><span class="bi-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
