<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ</title>

</head>
<style>
  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>

<form action="advance" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        お名前
      </th>
      <td>
        <input type="text" name="name" value="{{$name ?? ''}}">
      </td>
    </tr>
    <tr>
      <th>
        メールアドレス
      </th>
      <td>


      </td>
    </tr>
    <tr>
      <th>
        メールアドレス
      </th>
      <td>

      </td>
    </tr>

  </table>
  <tr>
    </td>
    <input type="submit" value="検索">
    </td>
  </tr>
  <button type="button" onclick="clearFormAll()">リセット</button>




</form>
@if (@isset($item))
{{ $item->links() }}
<table>
  <tr>
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
  </tr>
  @foreach ($item as $item)
  <tr>
    <td>
      {{$item->getID()}}
    </td>
    <td>
      {{$item->getLast_Name()}}
      {{$item->getFirst_Name()}}
    </td>
    <td>
      <?php
      if ($item->getGender() === 1) {
        echo '男性';
      } else {
        echo '女性';
      } ?>
    </td>
    <td>
      {{$item->getemail()}}
    </td>
    <td>
      </div>
      <?php $content = $item->getOpnion();
      echo mb_strimwidth(strip_tags($content), 0, 52, '…', 'UTF-8'); ?>

    </td>

  <tr>
    <td>

    </td>
    <td>
      @endforeach
  </tr>

</table>


@endif





<script type="text/javascript">
  function clearFormAll() {
    for (var i = 0; i < document.forms.length; ++i) {
      clearForm(document.forms[i]);
    }
  }

  function clearForm(form) {
    for (var i = 0; i < form.elements.length; ++i) {
      clearElement(form.elements[i]);
    }
  }

  function clearElement(element) {
    switch (element.type) {
      case "email":
      case "reset":
      case "button":
      case "image":
        return;
      case "file":
        return;
      case "text":
      case "textarea":
        element.value = "";
        return;
      case "radio":
      case "checkbox":
        element.checked = false;
        return;
      case "select-one":
      case "select-multiple":
        element.selectedIndex = 0;
        return;
      default:
    }
  }
</script>