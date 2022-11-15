 // Đối tượng Validator
function Validator(options){

    function getParent(element, selector) {
        while (element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
        
    }

    var selectorRules = {};
    // Hàm thực hiện validate
       function validate(inputElement, rule) {
        var errorElement = getParent(inputElement,options.formGroupSelector).querySelector(options.errorSelector); 
        var errorMessage;
        // Lấy ra rules cả selector
        var rules = selectorRules[rule.selector];
        //  Lặp qua từng rule và kiểm tra 
        // Nếu có lỗi thì dừng việc kiểm tra
        for(var i=0; i< rules.length; ++i){
            switch (inputElement.type){
                  case 'radio':
                  case ' checkbox': 
                  errorMessage = rules[i](
                    formElement.querySelector(rule.selector + ':checked'));
                  break;
                  default:
                    errorMessage = rules[i](inputElement.value);
            }
            
            if(errorMessage) 
            break;
        }
        

        if(errorMessage){
           errorElement.innerText = errorMessage;
           getParent(inputElement,options.formGroupSelector).classList.add('invalid');
        }else {
            errorElement.innerText = '';
            getParent(inputElement,options.formGroupSelector).classList.remove('invalid');
        }
        return !errorMessage;
       }
    //    Lấy element của form cần validate
       var formElement = document.querySelector(options.form);
       if(formElement){
        //  Khí submit form
        formElement.onsubmit = function (e) {
              e.preventDefault();
              var isFormvalid = true;
            //   Lặp qua từng rules và validate
              options.rules.forEach(function (rule) {
                // Thực hiện lặp qua từng rule
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if(!isValid){
                    isFormvalid = false;
                }
              });
             
                     
            if(isFormvalid) {
                // Trường hợp submit với javascript
               if(typeof options.onsubmit === 'function'){
                var enableInputs = formElement.querySelectorAll('[name]');
                var formValues = Array.from(enableInputs).reduce(function (values, input){

                  switch(input.type){
                    case 'radio':
                    case 'checkbox':
                        values[input.name] = formElement.querySelector('input[name="'+ input.name +'"]:checked').value;
                        break;
                    default:
                        values[input.name] = input.value;
                  }
                  return values;
                }, {});
                options.onsubmit(formValues);
               }
            //    Trường hợp submit với hành vi mặc định 
            }else {

                // formElement.submit();
            }
        }
        // Lặp qua mỗi rule và xử lý (lắng nghe xự kiện blur , input)
        options.rules.forEach(function (rule) {
            //  Lưu lại các rules cho mối input
            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test);
            } else {
                 selectorRules[rule.selector] = [rule.test];
            }
            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function(inputElement){
                if(inputElement) {
                    //  Xử lý trường hợp blur khỏi input
                   inputElement.onblur = function(){
                       validate(inputElement, rule);
                   }
                //    Xử lý mỗi khi người dùng nhập vào input
                inputElement.oninput = function(){
                    var errorElement = getParent(inputElement,options.formGroupSelector).querySelector(options.errorSelector); 
                    errorElement.innerText = '';
                    getParent(inputElement,options.formGroupSelector).classList.remove('invalid');
                }
                }

            });
            
           
        });
        console.log(selectorRules); 

       }
}
// Định nghĩa các rules
// Nguyên tắc của các rules:
// 1. Khi có lỗi => Trả ra mesage lỗi
// 2. Khi hợp lệ => Không trả ra cái gì cả (undifined)
Validator.isRequired = function (selector, mesage){
    return {
        selector: selector,
        test: function (value) {
              return value ? undefined : mesage || 'Vui lòng nhập trường này'
        }
    }

}
Validator.isEmail = function(selector,mesage){
    return {
        selector: selector,
        test: function (value) { 
             var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
             return  regex.test(value) ? undefined : mesage ||'Email chưa chính xác';
        }
    }
}
Validator.isPhone = function(selector,mesage){
    return {
        selector: selector,
        test: function (value) { 
            var regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
             return  regex.test(value) ? undefined : mesage ||'Số điện thoại chưa chính xác';
        }
    }
}

Validator.minLength = function(selector, min,mesage){
    return {
        selector: selector,
        test: function (value) { 
             return  value.length >= min ? undefined : mesage || `Vui Lòng nhập tối thiểu ${min} ký tự`;
        }
    }
}
Validator.isConfirmed = function(selector, getConfirmValue ,message){
    return {
        selector: selector,
        test: function (value) { 
             return  value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}
