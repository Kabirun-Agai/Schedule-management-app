<body>
    <div class="form-block" id="left-content">
      <div class="form-block-header">
        <h1>ログイン</h1>
      </div>
      <div class="form-block-body">
        <form action="/user/login" accept-charset="utf-8" method="post">
          <?php if(isset($error)) : ?>
            <div class="clearfix" style="color:red">
              ログインできませんでした。
            </div>
          <?php endif; ?>
          <p>
            <label for="form_username">ユーザ名</label>
            <input name="username" value="" type="text" id="form_username">
          </p>
          <p>
            <label for="form_password">パスワード</label>
            <input name="password" value="" type="password" id="form_password" >
          </p>
        
          <div class="actions">
            <input type="button" value="戻る" onclick="location.href='/welcome'">
            <input name="submit" value="保存" type="submit" id="form_submit">
          </div>

          
        </form>
        
      </div>
    </div>
</body>
