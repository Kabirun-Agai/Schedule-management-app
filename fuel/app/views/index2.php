<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"/>
        <title>knockout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="knockout-app">
            <div class="flex">
              <div>
                <form data-bind="submit:handleSubmit">
                  <div>
                    <label for="formName">
                      formName
                    </label>
                    <input data-bind="value:title" id="formName">
                  </div>
                  <div>
                    <label for="formEmail">
                      formEmail
                    </label>
                    <input data-bind="value:formEmail"  id="formEmail">
                  </div>
                  <div>
                    <label for="formTekito">
                      formTekito
                    </label>
                    <input data-bind="value:formTekito" id="formTekito">
                  </div>
                  <input type="submit">
                </form>
              </div>
            </div>
          </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout-validation/2.0.4/knockout.validation.min.js"></script>
          
            <script src="/assets/js/knocout.js"></script>
            
    </body>
</html>