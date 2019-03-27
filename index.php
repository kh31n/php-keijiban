<html>
<head>
  <title>簡易掲示板</title>
</head>
<body>
  <form method="post">
    <textarea name="textarea" rows="10" cols="50" placeholder="Write Something Here"></textarea>
    <button type="submit" name="action" value="send">送信</button>
  </form>
  <hr>
  <?php
    if(isset($_POST['action'])) {
      $contents = $_POST['textarea'];
      $contents .= "\n";
      $fp = fopen("contents.dat","a");
      fwrite($fp, $contents);
      fclose($fp);
      $fp2 = fopen("contents.dat","r");
      while($line = fgets($fp2))
        print "{$line}<br><hr>";
      fclose($fp2);
    } else {
      $fp = fopen("contents.dat", "r");
      while($line = fgets($fp))
        print "{$line}<br><hr>";
      fclose($fp);
    }
   ?>
</body>
</html>
