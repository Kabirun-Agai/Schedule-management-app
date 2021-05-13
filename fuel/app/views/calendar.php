<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<?php echo Asset::css('style.css');?>
<link href='/assets/js/lib/main.css' rel='stylesheet' />
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
      // events: self.event = ko.observable(<?php //echo $data ;?>);'/rest/calendar/getEvents/${a}',//assets/js/examples/json/events.jsonでも表示可
      // events: '/rest/calendar/getEvents/${a}',
      events: function(info, successCallback, failureCallback) {
        $.ajax({
              type: "get",
              //ここでデータの送信先URLを指定します。
              url: '/rest/calendar/getEvents/0',
              dataType: "json", //データ形式を指定
            }).then((res) => {
              successCallback(res);
              console.log(res);
        });

        // $('#select01').on('change',function(){
        //   $.ajax({
        //       type: "get",
        //       //ここでデータの送信先URLを指定します。
        //       url: '/rest/calendar/getEvents/' + $(this).val(),
        //       dataType: "json", //データ形式を指定
        //     }).then((res) => {
        //       successCallback(res);

        //       console.log(res);
        //     });
        // })
      },
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
        });
      },
    });
    calendar.render();

    document.getElementById("select01").addEventListener('change', function()　{
      $.ajax({
          type: "get",
          //ここでデータの送信先URLを指定します。
          url: '/rest/calendar/getEvents/' + $(this).val(),
          dataType: "json", //データ形式を指定
        }).then((res) => {
            calendar.removeAllEvents();
            calendar.addEventSource(res);
            calendar.render();
        });
    });

  });


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('listcalendar');

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
      initialView: 'listMonth',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events: function(info, successCallback, failureCallback) {
        $.ajax({
              type: "get",
              //ここでデータの送信先URLを指定します。
              url: '/rest/calendar/getEvents2/0',
              dataType: "json", //データ形式を指定
            }).then((res) => {
              successCallback(res);
              console.log(res);
        });
      },
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
          
        });
      },
    });
    
    calendar.render();
    document.getElementById("select01").addEventListener('change', function()　{
        $.ajax({
              type: "get",
              //ここでデータの送信先URLを指定します。
              url: '/rest/calendar/getEvents2/' + $(this).val(),
              dataType: "json", //データ形式を指定
            }).then((res) => {
                calendar.removeAllEvents();
                calendar.addEventSource(res);
                calendar.render();
            });
    });

    
  });


</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #contents{
    width: auto;
  }


  .calendar1{
    width: 60%;
    display: inline-block;
  }

  .calendar2{
    width: 30%;
    display: inline-block;
  }

</style>

</head>
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
</html>
