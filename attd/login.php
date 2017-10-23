<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/semantic.min.css">
    <script src="plugins/semantic-ui/semantic.min.js"></script>


    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">



    <!-- Site Properties -->
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/reset.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/site.css">

    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/container.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/grid.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/header.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/image.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/menu.css">

    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/divider.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/segment.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/form.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/input.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/button.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/list.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/message.css">
    <link rel="stylesheet" type="text/css" href="plugins/semantic-ui/components/icon.css">

    <link rel="stylesheet" href="plugins/sweetalert/dist/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="plugins/jQuery/jquery-3.2.0.min.js"></script>
    <script src="plugins/semantic-ui/components/form.js"></script>
    <script src="plugins/semantic-ui/components/transition.js"></script>
    <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="dist/js/login.js"></script>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
    <script>
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            username: {
                                identifier  : 'username',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your username'
                                    }
                                ]
                            },
                            password: {
                                identifier  : 'password',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your password'
                                    },
                                    {
                                        type   : 'length[1]',
                                        prompt : 'Your password must be at least 1 characters'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <img src="dist/img/logo-ipb.jpg" class="image">
            <div class="content">
                Log-in to your account
            </div>
        </h2>

        <div id="error">
        <!-- error will be shown here ! -->
    </div>
        <form class="ui large form" method="post" action="config/checklogin.php">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="txtusername" placeholder="Username" id="txtusername">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password" id="password">
                    </div>
                </div>


                <div class="ui fluid large teal submit button">
                    <button class="teal ui button" id="btnlogin" name="btnlogin">Login</button>
                </div>
            </div>
            <div class="ui error message"></div>

        </form>


    </div>
</div>

</body>

</html>
