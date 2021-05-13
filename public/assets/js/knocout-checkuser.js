

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
    
    self.userName=ko.observable("").extend({
      required:{
          message:"ユーザ名は必須です"
      },
      minLength:{
          message:"ユーザ名は2文字以上です",
          params:2
      }
    });

    self.email=ko.observable("").extend({
      required:{
          message:"メールアドレスは必須です"
      },
      email:{
        message:"emailの形式が正しくありません"
      }
    });

    self.oldpassword=ko.observable("").extend({
      required:{
          message:"現在のパスワードを入力してください"
      },
    });

    self.password=ko.observable("").extend({
      required:{
          message:"パスワードは必須です"
      },
      minLength:{
        params:6,
        message:"パスワードは6文字以上にしてください"
      }
    });

    self.checkpass=ko.observable("").extend({
      required:{
          message:"確認用パスワードは必須です"
      },
      minLength:{
        params:6,
        message:"パスワードは6文字以上にしてください"
      }
    });

    self.checkuser=function(){
      // if(self.time.val() == "")
      var errors = ko.validation.group(self);
      
      if (errors().length > 0 && self.password() != self.checkpassword()) {
         errors.showAllMessages();
         var options = {
          title: "入力に誤りがあります",
          text: errors()+",パスワードが一致しません",
          icon: "error", // warning, info, error
        
        }
          
        swal(options);
         console.log(errors());
         return;

      }else if(errors().length > 0){
        errors.showAllMessages();
         var options = {
          title: "入力に誤りがあります",
          text: errors()+"\n",
          icon: "error", // warning, info, error
        
        }
          
        swal(options);
         console.log(errors());
         return;

      }else if(self.password != self.checkpassword){
        errors.showAllMessages();
         var options = {
          title: "入力に誤りがあります",
          text: "パスワードが一致しません",
          icon: "error", // warning, info, error
        
        }
          
        swal(options);
         console.log(errors());
         return;

      }else{
        return true;
      }
    }

    self.checkuserName=function(){
      var errors = ko.validation.group(self);

      if (errors().length > 4) {
        errors.showAllMessages();
        var options = {
         title: "入力に誤りがあります",
         text: errors()[0]+"",
         icon: "error", // warning, info, error
      }   
       swal(options);
        console.log(errors());
        return;
      }else{
        return true;
      }
    }

    self.checkemail=function(){
      var errors = ko.validation.group(self);

      if (errors().length >4) {
        errors.showAllMessages();
        var options = {
         title: "入力に誤りがあります",
         text: errors()[0]+"",
         icon: "error", // warning, info, error
      }   
       swal(options);
        console.log(errors());
        return;
      }else{
        return true;
      }
    }

    self.checkpassword=function(){
      var errors = ko.validation.group(self);
      if (errors().length >2) {
        errors.showAllMessages();
        var options = {
         title: "入力に誤りがあります",
         text: errors()+"",
         icon: "error", // warning, info, error
      }   
       swal(options);
        console.log(errors());
        return;
      }else{
        return true;
      }
    }
  }
  
  const knockoutApp = document.querySelector("#knockout-app");
  ko.applyBindings(new viewModel(), knockoutApp);