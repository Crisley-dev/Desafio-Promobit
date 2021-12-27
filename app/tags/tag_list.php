<?php

include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'import.html');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'connection.php');
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'tags' . DIRECTORY_SEPARATOR . 'menu.html'); 

$sql = "SELECT * from tag";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tags</title>

    <link rel="stylesheet" href="css/style_tags.css">
    <script src="js/tag_function.js"></script>
</head>

<body >
    <div class="container py-3 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-12 col-xl-5">
                <div class="card shadow-lg p-3 card-geral">
                    <div class="cad-header text-center underline">
                        <h3>Lista de Tags</h3>
                    </div>
                    <div class="card-body p-3 text-center">

                        <div class="mb-sm-6 mt-md-2 pb-3">
                            <table class="table table-hover table-striped table-responsive text-center" id="tb_list_tags">
                                <thead>
                                    <th>ID</th>
                                    <th>TAG</th>
                                </thead>
                                <tbody>
                                   <?php foreach($result as $data):
            
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $data['id'];?></td>
                                        <td><?php echo $data['name'];?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>