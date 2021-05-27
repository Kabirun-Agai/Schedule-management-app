<!DOCTYPE html>
<html>
    <?php echo View::forge('head'); ?>
    <body>
        <header id="header"> 
            <div class="header-logo">
              <li id="header-logo"><a href="/welcome">スケジュール管理アプリ</a></li>
            </div>

            <ul class="header-right header-float header-hover">
                <div> 
                    <?php if (Auth::check()) :?>
                        <li><a href="/user/edit_form">登録内容変更</a></li>
                        <li id="logout"><a href="/user/logout" onclick="disp2()">ログアウト</a></li>
                    <?php else : ?>
                        <li><a href="/user/form">新規登録</a></li>
                        <li id="login"><a href="/user/login_form">ログイン</a></li>
                    <?php endif; ?>
                </div>

            </ul>
        </header>

   
        <?php echo $content; ?>
 

        <?php echo View::forge('script');?>
    </body>
    
</html>