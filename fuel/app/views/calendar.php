<body>

　<h1 id="nextschedule">次の予定:
    <?php 
    if ($time){
      echo $time[0]["start"]; 
      echo $time[0]["title"];
    }else
      echo "なし";
    ?>
    </h1>

    <div id="contents">
    <select id="select01">
        <option value="0">すべて</option>
        <option value="1">仕事</option>
        <option value="2">遊び</option>
        <option value="3">食事</option>
        <option value="4">その他</option>
    </select>

    <div class="calendar1">
    <div id='calendar'>
      <button id="eventbtn" onclick="location.href='/member/event/form'">予定を追加</button>
    </div>
    </div>

    <div class="calendar2">
      <div id='listcalendar'></div>
    </div>
  </div>
</body>

