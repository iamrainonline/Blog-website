<!-- pagina - id, titlu, url, vizibilitate, trash
  sectiuni id, pagina_aferenta, text, -->
  <?php
 
 include "connect.php";

 # stabilire pagina principala
 $url_pagina = '';
 $pag_id = 0;

 $_htm = '';

 if(isset($_GET['url']) and $_GET['url'] != '') $url_pagina = $_GET['url'];

 # query pagina
 $sql = "select * from pagini where url='{$url_pagina}'";
 $sql = $db->query($sql);
 if($sql and $sql->num_rows == 1){
   $row = mysqli_fetch_assoc($sql);
   $pag_id = $row['id'];
 }

 # get page sections
 if($pag_id != 0){
    $sql = "select * from sectiuni_pagini where pag_id='{$pag_id}'";
    $sql = $db->query($sql);
    if($sql and $sql->num_rows > 0){
      while($row = mysqli_fetch_assoc($sql)){
        $_htm .= '<div class="section">'.$row['text'].'</div>';
      }
    }
 }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    
    <?= $_htm; ?>


  </body>
  </html>