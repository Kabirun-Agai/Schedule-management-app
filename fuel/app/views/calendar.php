<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='/assets/js/lib/main.css' rel='stylesheet' />
<?php echo Asset::css('style.css');?>
<script src='/assets/js/lib/main.js'></script>
<script src="/assets/js/lib/locales-all.js"></script>
<script src="/assets/js/moment.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script>
  var date = new Date();
    
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        // method: post,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      //timeZone: 'Asia/Tokyo',
      locale: 'ja',
      initialDate: date,
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events: '/rest/calendar/getEvents/${a}',//assets/js/examples/json/events.jsonでも表示可
      eventSources: [
          {
            googleCalendarApiKey: 'AIzaSyDFmu3IwAeWovN0w6xvubPSVXBvcoxfvRI',
            googleCalendarId: 'japanese__ja@holiday.calendar.google.com',
            display: 'background',
        }
      ],
      eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
      eventClick: function(info) {
        window.location.href = '/member/event/show/' + info.event.id  + "/" + moment(info.event.start).format('MM-DD');
      },
      eventDrop: function (info) {
        $.ajax({
          //POST通信
          type: "post",
          //ここでデータの送信先URLを指定します。
          url: "/rest/calendar/dropEvents",
          dataType: "json", //データ形式を指定
          data: {
            start_date: moment(info.event.start).format('YYYY-MM-DD HH:mm'), //dropped_dateをキーにして値を送信
            end_date: moment(info.event.end).format('YYYY-MM-DD HH:mm'),
            id: info.event.id, //idをキーにして値を送信
          },
        }).then((res) => {
          console.log(res);
          calendar.render();
        });
      },
    });
    
    calendar.render();
  });
</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>

</head>
<body>
<form method="post" action="">
  <select name="state" id="select01">
    <option value="0">すべて</option>
    <option value="1">仕事</option>
    <option value="2">遊び</option>
    <option value="3">食事</option>
    <option value="4">その他</option>
  </select>
</form>
  <div id='calendar'>
  <button id="eventbtn" onclick="location.href='/member/event/form'">予定を追加</button>
  </div>
  

</body>
</html>
