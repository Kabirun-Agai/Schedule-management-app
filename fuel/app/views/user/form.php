<!DOCTYPE HTML>
<html>
	<header>
	  <meta charset="UTF-8">
    <?php echo Asset::css('style.css');?>
    <?php echo Asset::css('viewformat.css');?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</header>
 
	<body>
  <div id="knockout-app">
      <div class="form-block" id="left-content">
        <div class="form-block-header">
          <h1>新規登録</h1>
        </div>
        <div class="form-block-body">
          <form action="/user/save" accept-charset="utf-8" method="post" data-bind="submit:checkuser">
            <p>
              <label for="form_username">ユーザ名</label>
              <input name="username" value="" type="text" id="form_username" data-bind="value:userName">
            </p>
          
            <p>
              <label for="form_email">メールアドレス</label>
              <input name="email" value="" type="email" id="form_email" data-bind="value:email">
            </p>

            <p>
              <label for="form_password">パスワード</label>
              <input name="password" value="" type="password" id="form_password" data-bind="value:password">
            </p>

            <p>
              <label for="form_check_password">確認用パスワード</label>
              <input name="check_password" value="" type="password" id="form_check_password" data-bind="value:checkpass">
            </p>
          
            <div class="actions">
              <input type="button" value="戻る" onclick="location.href='/event/calendar'">
              <input name="submit" value="保存" type="submit" id="form_edit">
            </div>

          </form>
        </div>
      </div>
   </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>
    <script src="/assets/js/knocout-checkuser.js"></script>
    
	</body>
</html>	