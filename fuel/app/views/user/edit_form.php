<html>

	<body>
    <div id="knockout-app">
      <div class="form-block" id="left-content">
        <div class="form-block-header">
          <h1>登録内容変更</h1>
        </div>
        <div class="form-block-body">

          <div class="container">
            <ul class="tab-list" id="tab-1">
              <li class="tab-item is-open">
                <a href="#userName" data-toggle>ユーザ名</a>
              </li>

              <li class="tab-item">
                <a href="#email" data-toggle>メールアドレス</a>
              </li>

              <li class="tab-item">
                <a href="#password" data-toggle>パスワード</a>
              </li>
            </ul>

            <?php if(isset($error)) : ?>
              <div class="clearfix" style="color:red">
                変更できませんでした
              </div>
            <?php endif; ?>

            <div class="tab-content is-open" id="userName">

              <form action="/user/editusername" accept-charset="utf-8" method="post" data-bind="submit: checkuserName">
                <p>
                  <label for="form_username">ユーザ名</label>
                  <input name="username" value="" type="text" id="form_username" data-bind="value: userName">
                </p>
              
                <div class="actions">
                  <input type="button" value="戻る" onclick="location.href='/event/calendar'" id="form_back">
                  <input name="submit" value="保存" type="submit" id="form_submit">
                </div>
              </form>

            </div>

            <div class="tab-content" id="email">

              <form action="/user/editemail" accept-charset="utf-8" method="post" data-bind="submit: checkemail">
                <p>
                  <label for="form_email">メールアドレス</label>
                  <input name="email" value="" type="email" id="form_email" data-bind="value: email">
                </p>
              
                <div class="actions">
                  <input type="button" value="戻る" onclick="location.href='/event/calendar'" id="form_back">
                  <input name="submit" value="保存" type="submit" id="form_submit">
                </div>
              </form>
    
            </div>

            <div class="tab-content" id="password">
              <form action="/user/editpassword" accept-charset="utf-8" method="post" data-bind="submit: checkpassword">
                <p>
                  <label for="form_password">現在のパスワード</label>
                  <input name="password" value="" type="password" id="form_password" data-bind="value:oldpassword">
                </p>
                

                <p>
                  <label for="form_newpassword">新しいパスワード</label>
                  <input name="newpassword" value="" type="password" id="form_newpassword" data-bind="value:password">
                </p>

                <p>
                  <label for="form_check_password">確認用パスワード</label>
                  <input name="check_password" value="" type="password" id="form_check_password" data-bind="value:checkpass">
                </p>
              
                <div class="actions">
                  <input type="button" value="戻る" onclick="location.href='/event/calendar'" id="form_back">
                  <input name="submit" value="保存" type="submit" id="form_submit">
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>
    <script src="/assets/js/knocout-checkuser.js"></script>
	</body>
</html>