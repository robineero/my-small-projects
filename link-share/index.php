<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Link sharing</title>
</head>
<body>

<main>
<div class="container">

    <div class="row my-4">
        <div class="col">

        <form method="get" action="action.php">
            <div class="form-group">
                <input type="text" class="form-control" name="link" aria-describedby="emailHelp" placeholder="Enter an url here">
                <small id="emailHelp" class="form-text text-muted">We'll never share your link with anyone else.</small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="comment" placeholder="Comment (not needed tbh)">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    </div>

    <div class="row mb-5">
        <div class="col">

            <table class="table">
                <tbody>

                <?php
                $json = file_get_contents('./links.json');
                $json_data = json_decode($json,true);
                ?>

                <?php foreach ($json_data as $item): ?>

                    <tr>
                        <td>
                            <a href="https://<?=$item["url"];?>" target="_blank"><?=$item["url"];?></a>
                            <small><?=$item["comment"];?></small>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

</main>
</body>
</html>
