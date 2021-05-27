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

    function disp2(){

        // 「OK」時の処理開始 ＋ 確認ダイアログの表示
        if(window.confirm('本当にログアウトしますか？')){
            location.href='/user/logout';
        }
        // 「OK」時の処理終了

        // 「キャンセル」時の処理開始
        else{

        window.alert('キャンセルされました'); // 警告ダイアログを表示

        }
        // 「キャンセル」時の処理終了

    }


    

</script>
