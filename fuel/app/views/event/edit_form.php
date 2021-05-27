
<body>
  <div id="knockout-app">
    <div class="form-block" id="left-content">
      <div class="form-block-header">
        <h1>編集</h1>
      </div>
      <div class="form-block-body">
        <form id="event" action="/member/event/edit/<?php echo $rows[0]['id'];?>" accept-charset="utf-8" method="post" data-bind="submit: checkeditevent">
          <p>
              <label for="form_title">タイトル:</label>
              <input name="title" value="<?php echo $rows[0]["title"] ; ?>" type="text" id="form_title" data-bind="valueWithInit: title">
            </p>

            <p>
              <label for="form_starttime">予定開始時刻:</label>
              <input name="start" value="<?php echo str_replace(" ", "T", $rows[0]["start"]);?>" type="datetime-local" id="form_starttime" data-bind="valueWithInit: starttime">
            </p>

            <p>
              <label for="form_endtime">予定終了時刻:</label>
              <input name="end" value="<?php echo str_replace(" ", "T", $rows[0]["end"]);?>" type="datetime-local" id="form_endtime" data-bind="valueWithInit: endtime">
            </p>

            <p>
              <label for="form_details">詳細:</label>
              <textarea cols="60" rows="8" name="details" id="form_details" ><?php echo $rows[0]["details"] ; ?></textarea>
            </p>

            <label for="form_details">カテゴリ</label>
            <select name="state">
              <option value="1">仕事</option>
              <option value="2">遊び</option>
              <option value="3">食事</option>
              <option value="4">その他</option>
            </select>

            <div class="actions">
              <input type="button" value="戻る" onclick="location.href='/member/calendar'">
              <button id="form_edit" >保存</button>
            </div>
        
        </form>
        
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>
<script src="/assets/js/knocout-checkevent.js"></script>
</body>