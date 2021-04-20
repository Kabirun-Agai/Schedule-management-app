<html>
　<header>
		<meta charset="UTF-8">
    <?php echo Asset::css('style.css');?>
    <?php echo Asset::css('viewformat.css');?>
	</header>
	<body>
      <div class="form-block" id="left-content">
        <div class="form-block-header">
          <h1>ログイン</h1>
        </div>
        <div class="form-block-body">
          <form action="/member/event/edit/<?php echo $rows[0]['id'];?>" accept-charset="utf-8" method="post">
            <p>
                <label for="form_title">タイトル:</label>
                <input name="title" value="<?php echo $rows[0]["title"] ; ?>" type="text" id="form_title">
              </p>

              <p>
                <label for="form_starttime">予定開始時刻:</label>
                <input name="start" value="<?php echo str_replace(" ", "T", $rows[0]["start"]);?>" type="datetime-local" id="form_starttime" >
              </p>

              <p>
                <label for="form_endtime">予定終了時刻:</label>
                <input name="end" value="<?php echo str_replace(" ", "T", $rows[0]["end"]);?>" type="datetime-local" id="form_endtime" >
              </p>

              <p>
                <label for="form_details">詳細:</label>
                <textarea cols="60" rows="8" name="details" id="form_details" ><?php echo $rows[0]["details"] ; ?></textarea>
              </p>

              <div class="actions">
                <input type="button" value="戻る" onclick="location.href='/event/calendar'">
                <input name="submit" value="保存" type="submit" id="form_submit">
              </div>
          
          </form>
          
        </div>
      </div>
	</body>
</html>