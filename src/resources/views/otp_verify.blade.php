<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
body{
  background:#eee;
}

.bgWhite{
  background:white;
  box-shadow:0px 3px 6px 0px #cacaca;
}

.title{
  font-weight:600;
  margin-top:20px;
  font-size:24px
}

.customBtn{
  border-radius:0px;
  padding:10px;
}

form input{
  display:inline-block;
  width:50px;
  height:50px;
  text-align:center;
}
       </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 text-center">
              <div class="row">
                <div class="col-sm-12 mt-5 bgWhite">
                  <div class="title">
                    Verify OTP
                  </div>

                  <form action="{{route('userAuth.otp_verify')}}" class="mt-5" method="post">
                    {{csrf_field()}}
                    <input class="" type="hidden" name="user_id" value="{{$user_id}}">
                    <input class="" type="hidden" name="otp_user_value" value="{{$otp}}">

                    <input class="otp" type="text" name="otp_value[]" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
                    <input class="otp" type="text" name="otp_value[]" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
                    <input class="otp" type="text" name="otp_value[]" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
                    <input class="otp" type="text" name="otp_value[]"oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 >

                  <hr class="mt-4">
                  <button type="submit" class='btn btn-primary btn-block mt-4 mb-4 customBtn'>Verify</button>

                </form>
            </div>
              </div>
            </div>
        </div>
      </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    let digitValidate = function(ele){
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

let tabChange = function(val){
    let ele = document.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }
 }
</script>
</html>
