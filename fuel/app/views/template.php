<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8' />
     <?php echo Asset::css('style.css');?>
     <?php echo Asset::css('viewformat.css');?>
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
     <link href='/assets/js/lib/main.css' rel='stylesheet' />
     <script src='/assets/js/lib/main.js'></script>
     <script src="/assets/js/lib/locales-all.js"></script>
     <script src="/assets/js/moment.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php echo Asset::js('tab.js');?>
     <script>
         function disp2(){

            // 「OK」時の処理開始 ＋ 確認ダイアログの表示
            if(window.confirm('本当にログアウトしますか？')){
                location.href='/user/logout';
            }
            // 「OK」時の処理終了

            // 「キャンセル」時の処理開始
            else{

            window.alert('キャンセルされました'); // 警告ダイアログを表示

            }
            // 「キャンセル」時の処理終了

        }
     </script>
    </head>
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
 
      

    </body>
</html>