<?php

function translate($text,$source_lang='en',$target_lang='es'){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://translate.googleapis.com/translate_a/single?client=gtx&dt=t',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'sl='.$source_lang.'&tl='.$target_lang.'&q='.urlencode($text),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded'
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);

  $sentencesArray = json_decode($response, true);
  $sentences = "";
  foreach ($sentencesArray[0] as $s) {
        $sentences .= isset($s[0]) ? $s[0] : '';
    }
  
  return $sentences;
}

if(isset($_POST['text'])){
  echo translate($_POST['text']);
  die;
}else{
  $output = translate('hello');
}

?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<div class="container mt-5">
  <div class="row">
    <div class="col-6">
      <p class="mb-3" style="font-weight: bold;">English</p>
      <textarea class="form-control input" style="resize:none;" rows="20">Hello</textarea>
    </div>
    <div class="col-6">
      <p class="mb-3" style="font-weight: bold;">English</p>
      <textarea class="form-control output" style="resize:none;" rows="20" readonly><?php echo $output;?></textarea>
    </div>
    <div class="col-12">
      <span class="btn-translate btn btn-primary d-block btn-block mt-3">Convert</span>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(".btn-translate").on('click',function(){
    inputtext = $(".input").val();
    postData = {
      'text':inputtext
    };
    $.ajax({
      url:'index.php',
      type:'post',
      data:postData,
      success:function(res){
        $(".output").html(res);
      }
    });
  });
</script>