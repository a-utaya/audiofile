<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ログイン</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>

    <form method = "post" action="login_act.php">
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class=" form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
            <input type="checkbox" id="pass">
            <label for="pass">パスワードを表示</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">ログイン</button>
        </div>
    </form>
    <script>
        var pw = document.getElementById('lpw');
        var pwCheck = document.getElementById('pass');
        pwCheck.addEventListener('change', function() {
            if(pwCheck.checked) {
                pw.setAttribute('type', 'text');
            } else {
                pw.setAttribute('type', 'password');
            }
        }, false);    
    </script>
</body>
</html>