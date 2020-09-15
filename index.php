<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    
    <!-- phpでjsonファイルの読み込み -->
    <?php
    $json2 = '{
      "name" : "テスト",
      "age" : 19
    }';

    //json2変数にjson配列が代入されているとする

    //json_decode(第一引数, 第二引数) 第ニ引数が true だと配列に、 false だとオブジェクトに変換される(ディホルトは false )
    $decoded_json = json_decode($json2); //json形式の文字列をデコードしてphpの変数に変換する

    var_dump($decoded_json); //オブジェクトとして変数に代入されているのが分かる
    ?>
    <!-- ////////////////////////////////////////////////////////////////////// -->


    <!-- phpでjsonファイルの書き込み -->
    <?php
      $json3 = '{
        "name" : "テスト",
        "age" : 20
      }';

      $data = json_decode($json3, true); //配列としてデコード

      $file = fopen('test.json', 'w+b');
      fwrite($file, json_encode($data));
      fclose($file);

      //日本語のようなマルチバイト文字をエンコードした場合jsonファイルは文字化けするが、json_decodeすれば正常に扱える

      print('<br>作成完了<br>');
    ?>
    <!-- ////////////////////////////////////////////////////////////////////// -->


    <script type="text/javascript">
      console.log('javascript');

      (function() {
        //php　→　javascript　へ配列の受け渡し
        //一度jsonに変換する

        <?php
        $str_array = ['aaa', 'bbb', 'ccc'];
        $json = json_encode($str_array); //jsonに変換
        ?>

        let json = <?php echo $json; ?>;　//echoでjsonの配列を丸々出力することで値とできる
        console.log(json);
      }).call(this);

    </script>
  </body>
</html>
