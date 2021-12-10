<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="style.css">

</head>

<style>
  .text {
    top: 35%;
    margin: bottom;
    margin-left: 50px;
    font-weight: bold;
    font-size: 14px;
    padding: 5px 0px 5px 40px;
  }

  input {
    align-self: center;

  }

  .st {
    width: 200px;
  }

  p {
    display: inline;
  }

  


  .errore {
    color: red;
  }

  .asterisk {
    display: inline;
    color: red;
  }

  .example {
    display: inline;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }





  .bottom_botton {
    font-size: 16px;
    width: 150px;
    height: 50px;
    color: white;
    background-color: black;
    border-radius: 5px;
  }

  form {
    position: relative;
  }
</style>


<body>

  @yield('content')
  <h1>お問い合わせ</h1>
  <form action="confirm" method="post">
    @csrf
    <!-- お名前 -->
    <table>
      <tr>
        <th>
          <p class="text">お名前</p>
          <p class="asterisk">※</p>
        </th>
        <td>
        <td class="st">
          <input type="text input_text" name="last_name" onblur="lastnameMessage(this)" value="{{old('last_name')}}"><br>
          <p class="example">例）山田</p>
          <p id="last_name" class="errore"></p><br><!-- 入力後エラー表示 -->
          @error('last_name')
          <p>{{$message}}</p>
          @enderror
        </td>
        <td class="st">
          <input type="text input_text" name="first_name" onblur="firstnameMessage(this)" value="{{old('first_name')}}"><br>
          <p class="example">例）太郎</p>
          <p id="first_name" class="errore"></p><br><!-- 入力後エラー表示 -->
          @error('first_name');
          <p>{{$message}}</p><br>
          @enderror
        </td>
        </td>
      </tr>
    </table>

    <!-- 入力後エラー -->
    <script type="text/javascript">
      function lastnameMessage(element) {
        if (!element.value) {
          document.getElementById('last_name').innerHTML = '姓は必須です。';
        } else {
          document.getElementById('last_name').innerHTML = '';
        }
      }
    </script>

    <!-- 入力後エラー -->
    <script type="text/javascript">
      function firstnameMessage(element) {
        if (!element.value) {
          document.getElementById('first_name').innerHTML = '名は必須です。';
        } else {
          document.getElementById('first_name').innerHTML = '';
        }
      }
    </script>




    <!-- 性別 -->
    <table>
      <tr>
        <th>
          <p class="text">性別</p>
          <p class="asterisk">※</p>
        </th>
        <td>
          <input type="radio" checked="checked" name="gender" value=1 value="{{old('gender')}}">男性
          <input type="radio" name="gender" value=2 value="{{old('gender')}}">女性<br>
        </td>
      </tr>
    </table>

    <!--メールアドレス -->
    <table>
      <tr>
        <th>
          <p class="text">メールアドレス</p>
          <p class="asterisk">※</p>
        <th>
        <td>
          <input id="email" type="mail" name="email" value="{{old('email')}}" onblur="emailErroerMessage(this)"><br>
          <p class="example">例）test@example.com</p>
          <!--　確認後エラー表示　-->
          @if($errors->has('email'))
          <p>{{$errors->first('email')}}</p><br>
          @endif
          <!-- 入力後エラー表示 -->
          <p id="email" class="errore">
            <span class="email email-success"></span>
          </p><br>
        </td>
      </tr>
      <table>
        <!-- 入力後エラー -->
        <script type="text/javascript">
          function emailErroerMessage(element) {
            // フォームの値を取得
            const str = document.getElementById('email').value;
            //　表示用の要素
            const obj = document.getElementsByClassName('email')
            // 郵便番号チェック
            if (str.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/)) {
              //郵便番号
              obj[0].innerHTML = "";
            } else if (str.length === 0) {
              //未入力
              obj[0].innerHTML = "メールアドレスは必須です。";
            } else {
              //郵便番号以外
              obj[0].innerHTML = "メールアドレスの形式で入力してください";
            }
          }
        </script>



        <!-- 郵便番号 -->
        <table>
          <tr>
            <th>
              <p class="text">郵便番号</p>
              <p class="asterisk">※</p>
            </th>
            <td>
              <p>〒</p>
              <input id="postcode" type="text" class="form-control" name="postcode" value="{{old('postcode')}}" onblur="toHalfWidth(this),postcodeErroerMessage(this),AjaxZip3.zip2addr(this,'','address','address');"><br>
              <p class="example">例）123−4567</p>
              <!--　確認後エラー表示　-->
              @if($errors->has('postcode'));
              <p>{{$errors->first('postcode')}}</p><br>
              @endif
              <!-- 入力後エラー表示 -->
              <p id="postcode" class="errore postcode postcode-success">
                <span class="postcode postcode-success"></span>
              </p><br>
            </td>
          </tr>
          <table>
            <!-- 半角変換 -->
            <script type="text/javascript">
              function toHalfWidth(elm) {
                elm.value = elm.value.replace(/[Ａ-Ｚａ-ｚ０-９！-～]/g, function(s) {
                    return String.fromCharCode(s.charCodeAt(0) - 65248);
                  })
                  .replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');
              }
            </script>
            <script type="text/javascript">
              function postcodeErroerMessage(element) {
                // フォームの値を取得
                const str = document.getElementById('postcode').value;
                //　表示用の要素
                const obj = document.getElementsByClassName('postcode');
                // 郵便番号チェック
                if (str.match(/^\d{3}-\d{4}$/)) {
                  //郵便番号
                  obj[0].innerHTML = "";
                } else if (str.length === 0) {
                  //未入力
                  obj[0].innerHTML = "郵便番号は必須です";
                } else {
                  //郵便番号以外
                  obj[0].innerHTML = "郵便番号ではありません";
                }
              }
            </script>
            <!-- 住所検索 -->
            <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>




            <!--　住所 -->
            <table>
              <tr>
                <th>
                  <p class="text">住所</p>
                  <p class="asterisk">※</p>
                </th>
                <td>
                  <input type="text" name="address" value="{{old('address')}}" onblur="addressErroerMessage(this)"><br>
                  <!--　確認後エラー表示　-->
                  @if($errors->has('address'));
                  <p>{{$errors->first('address')}}</p><br>
                  @endif
                  <p class="example">例）東京都渋谷区千駄ヶ谷 1-2-3</p>
                  <p id="address" class="errore"></p><br><!-- 入力後エラー表示 -->
                </td>
              </tr>
            </table>
            <!-- 入力後エラー -->
            <script type="text/javascript">
              function addressErroerMessage(element) {
                if (!element.value) {
                  document.getElementById('address').innerHTML = '住所は必須です。';
                } else {
                  document.getElementById('address').innerHTML = '';
                }
              }
            </script>

            <!-- 建物名 -->
            <table>
              <tr>
                <th>
                  <p class="text">建物名</p>
                </th>
                <td>
                  <input type="text" name="buildeing_name" value="{{old('buildeing_name')}}"><br>
                  <p class="example">例）千駄ヶ谷マンション101</p><br>
                </td>
              </tr>
            </table>


            <table>
              <tr>
                <th>
                  <!-- ご意見 -->
                  <p class="text">ご意見</p>
                  <p class="asterisk">※</p>
                </th>
                <td>
                  <!-- 改行は文字数として数えられない -->
                  <textarea id="opinion" class="input_text" cols="30" rows="3" name="opinion" onblur="check()">{{old('opinion')}}</textarea><br>

                  <!--　確認後エラー表示　-->
                  @if($errors->has('opinion'));
                  <p>{{$errors->first('opinion')}}</p>
                  @endif
                  <p id="validation" class=errore></p><br><!-- 入力後エラー表示 -->
                </td>
              </tr>
            </table>
            <script type="text/javascript">
              const str = document.getElementById('opinion');
              const obj = document.getElementById('validation');

              function check() {
                const value = str.value.replace(/\n/g, "");
                if (value.length >= 120) {
                  obj.innerHTML = "120文字以内で入力してください。";
                } else if (value.length >= 1) {
                  obj.innerHTML = "";
                } else {
                  obj.innerHTML = "ご意見は必須です。"
                }
              }
            </script>
            <input class=bottom_botton type="submit" value="確認">
</body>

</html>