<!DOCTYPE HTML>
<html>
	<header>
		<meta charset="UTF-8">
    <?php echo Asset::css('style.css');?>
    <?php echo Asset::css('viewformat.css');?>
	</header>
 
	<body>
      <div class="form-block" id="left-content">
        <div class="form-block-header">
          <h1><?php echo $data ?>の予定</h1>
        </div>
        <div class="form-block-body">
          <p>
              <label for="form_title">タイトル:<?php echo $rows[0]["title"] ?></label>
            </p>

            <p>
              <label for="form_starttime">予定開始時刻:<?php echo $rows[0]["start"] ?></label>
            </p>

            <p>
              <label for="form_endtime">予定終了時刻:<?php echo $rows[0]["end"] ?></label>
            </p>

            <p>
              <label for="form_details">詳細:<?php echo $rows[0]["details"] ?></label>
            </p>

            <div class="actions">
              <input type="button" value="戻る" onclick="location.href='/event/calendar'">
              <input type="button" value="編集" onclick="location.href='/member/event/edit_form/' + <?php echo $rows[0]['id'];?>">
            </div>

        </div>
      </div>

		<!-- <div id='calendar'></div> -->
	</body>
</html>	
