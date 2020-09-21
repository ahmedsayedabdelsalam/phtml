<?php
require __DIR__ . '/../vendor/autoload.php';

use PHTML\Facades\Button;
use PHTML\Facades\Div;
use PHTML\Facades\P;

$html = Div::state(['show' => true])
    ->innerHtml([
            Button::make('toggle')->onClick('show = !show'),
            P::make('toggle me')->showWhen('show === true')
        ]
    )
    ->render();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
<?php echo $html; ?>
</body>
</html>
