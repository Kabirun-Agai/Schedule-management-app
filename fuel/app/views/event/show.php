<!DOCTYPE HTML>
<html>
	<header>
		<meta charset="UTF-8">
    <?php echo Asset::css('style.css');?>
    <?php echo Asset::css('viewformat.css');?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
              <input id="delete-button" type="button" value="削除">
            </div>

        </div>
      </div>

      <script>
      var options = {
        title: "本当に削除しますか？",
        text: "この操作を取り消すことはできません",
        icon: "info",
        buttons: {
          cancel: "Cancel", // キャンセルボタン
          ok: true
        }
      };
        // swal(options)
        //   // then() メソッドを使えばクリックした時の値が取れます
        //   .then(function(val) {
        //     if (val) {
        //       // Okボタンが押された時の処理
        //       swal({
        //         text: "予定が削除されました",
        //         icon: "warning",
        //         buttons: {
        //           ok: true
        //         },
        //         timer: 1500 // 2.5秒後に自動的に閉じる
        //       });
              
        //     } else {
        //       // キャンセルボタンを押した時の処理
        //       // valには 'null' が返ってきます
        //       swal({
        //         text: "キャンセルされました",
        //         icon: "warning",
        //         buttons: false,
        //         timer: 1500 // 2.5秒後に自動的に閉じる
        //       });
        //     }
        // });

      

      var btn = document.getElementById('delete-button');

      btn.addEventListener('click', function(e) {

        swal(options)
            // then() メソッドを使えばクリックした時の値が取れます
            .then(function(val) {
              
              if (val) {
                
                e.preventDefault();
                // Okボタンが押された時の処理
                swal({
                text: "予定が削除されました",
                icon: "warning",
                buttons: {
                  ok: true
                }
                }).then(function(val) {
                    location.href='/member/event/delete/' + <?php echo $rows[0]['id'];?>
                  });
              }else {
              // キャンセルボタンを押した時の処理
              // valには 'null' が返ってきます
                swal({
                  text: "キャンセルされました",
                  icon: "warning",
                  buttons: false,
                  timer: 1500 // 2.5秒後に自動的に閉じる
                });
              }
          });

      })


    </script>
	</body>
</html>	
