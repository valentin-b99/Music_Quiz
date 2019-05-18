<?php
    session_start();
    if (empty($_SESSION['question']) || !isset($_SESSION['score']) || $_SESSION['question'] < 1) {
        $_SESSION['question'] = 1;
        $_SESSION['score'] = 0;
    }

    require("require/questions.php");
?>

<!DOCTYPE html>
<html lang=fr-FR>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>English Music Quiz - <?php if ($_SESSION['question'] > count($questions)) { echo "Congratulations !"; } else { echo $_SESSION['question'] . "/" . count($questions); } ?></title>
        <link rel="icon" type="image/png" href="img/icon.png" />
        <meta name="description" content="English Music Quiz"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div id="background-img"></div>
        <div id="block">
            <img src="/img/logo.png" class="w-50" style="margin-bottom: 40px;" />
            <?php if ($_SESSION['question'] > count($questions)) { ?>
                <p class="h4">Congratulations you completed the quiz!</p>
                <div id="score" class="mt-5 h2">Your score : <?php echo $_SESSION['score'] . "/" . count($questions); ?></div>
                <button id="retry-button" class="w-50 btn btn-primary">Retry</button>
            <?php } else { ?>
                <form>
                    <div id="questions" class="h2"><?php echo $questions[$_SESSION['question']]['question']; ?></div>
                    <div id="answers" class="row text-center m-0 mt-5">
                        <?php
                            foreach ($questions[$_SESSION['question']]['answers'] as $key => $value) {
                                echo '<div class="col-md-3">';
                                echo '<input type="radio" id="ans' . $key . '" name="answers" value="' . $key . '">';
                                echo '<label for="ans' . $key . '">' . $value . '</label>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div id="div-submit-button">
                        <button type="submit" id="submit-button" class="w-50 btn btn-primary">Next question</button>
                    </div>
                </form>
            <?php } ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="error-modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="error-modalLabel">Error ! :(</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="error-modal-msg" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript">
        function set_right_ans_visible() {
            $("label[for='ans" + <?php echo $questions[$_SESSION['question']]['right']; ?> + "']").css({'color': '#00c521', 'font-size': 'bold'});
        }
    </script>
</html>