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

            <div class="mb-3" id="cat-fact"></div>
            <script src="./cat-facts.js"></script>

        <form method="get" action="./action.php">
            <div class="form-group">
                <input type="text" class="form-control" name="link" placeholder="Enter an url here">
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
                            <small><?=$item["comment"];?>

                                <a href="action.php?d=<?=$item["id"];?>">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="#cacaca" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                </a>

                            </small>
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
