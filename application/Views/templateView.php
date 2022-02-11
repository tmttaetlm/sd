<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Круглосуточная служба поддержки ТОО «ШамДан»</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/public/css/styles_0.1.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <meta name="theme-color" content="#678f33">
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="title">
                    <h1><a href="/">Круглосуточная служба поддержки ТОО «ШамДан»</a></h1>
                </div>
                <div class="user">
                    <?php if ($data['user']){echo '<a href="#">'.$data['user'].'</a><a href="/user/logout">Выход</a>'; }?> 
                </div>
            </div>
        </header>
        <?php echo $data['content']; ?>
        <script type="module" src="/public/js/scripts_0.1.js"></script>
    </body>
</html>
