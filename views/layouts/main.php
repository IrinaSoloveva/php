<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Document</title>

</head>
<body>
<? if ($auth) : ?>
    Добро пожаловать: <?= $username ?> <a href="/auth/logout/">Выход</a>
    <?if ($isAdmin) : ?>
        <a href="/admin/">Админка</a>
    <? endif; ?>
<? else: ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login">
        <input type="password" name="pass">
        <input type="submit" name="ok" value="Войти">
    </form>
<? endif; ?>

<br>
В <a href="/basket/">корзине </a> <?= $count ?>
<br>
<?= $content; ?>
<p>(c) 2019</p>
<script>
    $(document).ready(function () {
        $(".action").on('click', function () {
            var idx = $(this).attr('data-idx');
            $.ajax({
                url: "/product/buy/",
                type: "GET",
                dataType: "json",
                data: {
                    idx: idx
                },
                error: function () {
                    alert('error');
                },
                success: function (answer) {
                    {
                        location.reload()
                    }
                }

            })
        });

    });

    $(document).ready(function () {
        $(".delete").on('click', function () {
            var idx = $(this).attr('data-idx');
            $.ajax({
                url: "/basket/delete/",
                type: "GET",
                dataType: "json",
                data: {
                    idx: idx
                },
                error: function () {
                    alert('error');
                },
                success: function (answer) {
                    {
                        location.reload()
                    }
                }

            })
        });

    });
</script>
</body>
</html>