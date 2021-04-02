<!DOCTYPE HTML>
<html>
	<meta charset="UTF-8">
	<body>
		<form action="/event/save" accept-charset="utf-8" method="post">
			<p>
				<label for="form_title">タイトル</label>
				<input name="title" value="" type="text" id="form_title">
			</p>

			<p>
				<label for="form_starttime">予定開始時刻</label>
				<input name="starttime" value="" type="datetime-local" id="form_starttime" step="300">
			</p>

            <p>
				<label for="form_endtime">予定終了時刻</label>
				<input name="endtime" value="" type="datetime-local" id="form_endtime" step="300">
			</p>

			<p>
				<label for="form_details">詳細</label>
				<textarea cols="60" rows="8" name="details" id="form_details"></textarea>
			</p>

			<div class="actions">
				<input name="submit" value="保存" type="submit" id="form_submit">
			</div>
		</form>
	</body>
</html>	