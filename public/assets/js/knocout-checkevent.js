function viewModel(){
    self=this;
    
    ko.bindingHandlers.valueWithInit = {
      init: function (element, valueAccessor, allBindingsAccessor, data, context) {
          var property = valueAccessor(), value = element.value;
          property(value);
          ko.bindingHandlers.value.init(element, valueAccessor, allBindingsAccessor, data, context);
      },
      update: ko.bindingHandlers.value.update
    };    

    self.title=ko.observable("").extend({
      required:{
          message:"タイトルは必須です"
      },
      minLength:{
          message:"タイトルは2文字以上です",
          params:2
      }
    });

    self.starttime=ko.observable("").extend({
      required:{
          message:"必須です"
      }
    });

    self.endtime=ko.observable("").extend({
      required:{
          message:"必須です"
      }
    });


    self.checkevent=function(){
      var errors = ko.validation.group(self);
      // if(self.time.val() == "")
      if (errors().length > 0) {
        var options = {
          title: "入力に誤りがあります",
          text: errors()+"\n",
          icon: "error", // warning, info, error
        }
        swal(options);
         errors.showAllMessages();
         return;
      }else{
        var options2 = {
          title: "予定を作成しました",
          icon: "info",
          buttons: {
            ok: true
          }
        };
        var btn = document.getElementById('form_edit');

        btn.addEventListener('click', function(e) {
          e.preventDefault();

          swal(options2)
              // then() メソッドを使えばクリックした時の値が取れます
              .then(function(val) {
                
                if (val) {
                  // Okボタンが押された時の処理
                  //submit()でフォームの内容を送信
                  document.getElementById('event').submit();
                }
            });

        })
      }
    }

    self.checkeditevent=function(){
      var errors = ko.validation.group(self);
      // if(self.time.val() == "")
      if (errors().length > 0) {
        var options = {
          title: "入力に誤りがあります",
          text: errors()+"\n",
          icon: "error", // warning, info, error
        }
        swal(options);
         errors.showAllMessages();
         return;
      }else{
        var options2 = {
          title: "予定を変更しました",
          icon: "info",
          buttons: {
            ok: true
          }
        };
        var btn = document.getElementById('form_edit');

        btn.addEventListener('click', function(e) {
          e.preventDefault();

          swal(options2)
              // then() メソッドを使えばクリックした時の値が取れます
              .then(function(val) {
                
                if (val) {
                  // Okボタンが押された時の処理
                  //submit()でフォームの内容を送信
                  document.getElementById('event').submit();
                }
            });

        })
      }
    }

  }
  
  const knockoutApp = document.querySelector("#knockout-app");
  ko.applyBindings(new viewModel(), knockoutApp);