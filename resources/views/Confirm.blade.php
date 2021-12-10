<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認画面</title>

</head>

<style>
  .text {
    font-weight: bold;
    display: inline;
    padding: 5px 0px 5px 40px;
  }

  p {
    display: inline;
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
</style>


<body>
  <h1>確認画面</h1>

  <form action="process" method="post">
    @csrf
    <p class="text">お名前</p>
    <p>{{$inputs['last_name']}}</p>
    <input type="hidden" name="last_name" value="{{$inputs['last_name']}}">
    <p>{{$inputs['first_name']}}</p>
    <input type="hidden" name="first_name" value="{{$inputs['first_name']}}"><br>

    <p class="text">性別</p>
    <p　class="gendr_view">
      <?php
      if ($inputs['gender'] === '1') {
        echo '男性';
      } else {
        echo '女性';
      } ?>
    </p>
    <input type="hidden" name="gender" value="{{$inputs['gender']}}"><br>

    </script>


    <p class="text">メールアドレス</p>
    <p>{{$inputs['email']}}</p>
    <input type="hidden" name="email" value="{{$inputs['email']}}"><br>

    <p class="text">郵便番号</p>
    <p>{{$inputs['postcode']}}</p>
    <input type="hidden" name="postcode" value="{{$inputs['postcode']}}"><br>

    <p class="text">住所</p>
    <p>{{$inputs['address']}}</p>
    <input type="hidden" name="address" value="{{$inputs['address']}}"><br>

    <p class="text">建物名</p>
    <p>{{$inputs['buildeing_name']}}</p>
    <input type="hidden" name="buildeing_name" value="{{$inputs['buildeing_name']}}"><br>


    <p class="text">ご意見</p>
    <p>{{$inputs['opinion']}}</p>
    <input type="hidden" name="opinion" value="{{$inputs['opinion']}}"><br>

    <button name="action" type="submit" value="submit">送信</button><br>
    <button name="action" type="submit" value="return">修正する</button>




</body>

</html>