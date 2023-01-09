<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dzenvolve</title>
</head>

<body class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">sexo</th>
                <th scope="col">cpf</th>
                <th scope="col">email</th>
                <th scope="col">celular</th>
                <th scope="col">profissão</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($person as $key => $pessoa): ?>
                <tr>
                    <th scope="row"><?= $key + 1; ?></th>
                    <td>
                        <?= $pessoa->nome; ?> <br />
                        <small>
                            <strong>Data de nascimento:</strong> 
                            <?= $pessoa->nascimento; ?>
                        </small>
                    </td>
                    <td><?= $pessoa->sexo; ?></td>
                    <td><?= $pessoa->cpf; ?></td>
                    <td><?= $pessoa->email; ?></td>
                    <td><?= $pessoa->celular; ?></td>
                    <td><?= $pessoa->profissao_id; ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

