<html>
    <head>
     <?php echo Asset::css('style.css');?>
     <?php echo Asset::css('viewformat.css');?>
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
     <script>
     $("#login").click(function(){
         alert("本当にログアウトしますか？");
     })
     </script>
     <style>
        calendar {
            padding: 100px;
        }
    </style>
    </head>
    <body>
        <header id="header"> 
            testheader
            <div class="header-logo">
            </div>

            <ul class="header-right header-float header-hover">
                <div> 
                    <?php if (Auth::check()) :?>
                        <li>登録内容変更</li>
                        <li id="logout"><a href="/user/logout">ログアウト</a></li>
                    <?php else : ?>
                        <li><a href="/user/form">新規登録</a></li>
                        <li id="login"><a href="/user/login_form">ログイン</a></li>
                    <?php endif; ?>
                </div>

            </ul>
        </header>

        <calendar>
            <?php echo $content; ?>
        </calendar>
      

        <footer>
        testfooter
        </footer>
    </body>
</html>