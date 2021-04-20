<html>
    <head>
     <?php echo Asset::css('style.css');?>
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
                        <li>ログアウト</li>
                    <?php else : ?>
                        <li>新規登録</li>
                        <li>ログイン</li>
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