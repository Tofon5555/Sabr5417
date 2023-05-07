<?php

@mkdir(nimadir);
$nimadir = file_get_contents("nimadir/$cid.txt");
//  @php_bot_kodlarii && @Kingsofphp && @phpuzkod
#----------- [ @veb_code ] ------------#
if($text == "📝 Post Yaratish" and $cid==$admin){
file_put_contents("nimadir/$cid.txt","postuz");
bot(sendMessage,[
chat_id=>$cid,
text=>"➡️ Inline tugma qoʻshish:


  *1)* `Firdavs|https://t.me/veb_code`",
parse_mode=>markdown,
"reply_markup"=>json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"⤴️ Orqaga"]],
]])
]);
exit();
}
//  @php_bot_kodlari && @Kingsofphp && @phpuzkod
#----------- [ @veb_code ] ------------#

if($nimadir == "postuz" and $text!= "⤴️ Orqaga" and $text!= "/start"){
file_put_contents("nimadir/$cid.txt","nega");
file_put_contents("key.txt","\n$text");
bot(sendMessage,[
chat_id=>$cid,
parse_mode=>markdown,
text=>"❗ Yaxshi, xabar har bir qatorda nechta boʻlsin",
"reply_markup"=>json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"⤴️ Orqaga"]],
]])
]);
exit();
}

//  @php_bot_kodlari && @Kingsofphp && @phpuzkod

#----------- [ @veb_code ] ------------#

if($nimadir == "nega" and $text!= "⤴️ Orqaga" and $text!= "/start"){
file_put_contents("nimadir/$cid.txt","send");
file_put_contents("chunk.txt","$text");
bot(sendMessage,[
chat_id=>$cid,
parse_mode=>markdown,
text=>"❗ Yaxshi, endi xabarni yuboring",
"reply_markup"=>json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"⤴️ Orqaga"]],
]])
]);
exit();
}
//  @php_bot_kodlari && @Kingsofphp && @phpuzkod
#----------- [ @veb_code ] ------------#


if($nimadir == "send" and $text!= "⤴️ Orqaga" and $text!= "/start"){
//sql baza ulaymiz!!!
  $res = mysqli_query($connect, "SELECT * FROM users");
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅ | Xabar jo'natish boshlandi",
    ]);unlink("nimadir/$cid.txt");
$x=0;
$y=0;
$mum = file_get_contents("chunk.txt");
$get2 = file_get_contents("key.txt");
$keyb=explode("\n",$get2);
$soni = substr_count($get2,"\n");
$uz = array();
for($x=1; $x <= $soni; $x++){
$ext=explode("\n",$get2)[$x];
$knopka=explode('|',$ext)[0];
$url=explode('|',$ext)[1];
$uz[]=["text"=>$knopka,"url"=>$url];
}
$keyy=array_chunk($uz, $mum);
$keyboard=json_encode([
'inline_keyboard'=>$keyy,
]);
while($a = mysqli_fetch_assoc($res)){
$id = $a['id'];
$ok=bot('copyMessage',[
        'chat_id'=>$id,
        'from_chat_id'=>$cid,
        'message_id'=>$mid,
        'reply_markup'=>$keyboard,
  ])->ok;
  if($ok==true){
  $x=$x+1;
  bot('editmessagetext',[
  'chat_id'=>$chat_id,
  'text'=>"✅ | Yuborildi $x

  ❎ | Yuborilmadi $y",
  'message_id'=>$mid+1,
  ]);
  }else{
  mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
  $y=$y+1;
  bot('editmessagetext',[
  'chat_id'=>$chat_id,
  'text'=>"✅ | Yuborildi $x

  ❎ | Yuborilmadi $y ",
  'message_id'=>$mid+1,
  ]);
  }
  }
  bot('deletemessage',[
  'chat_id'=>$chat_id,
  'message_id'=>$mid+1,
  ]);
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"📡 Xabar Yuborish Tugadi!: \n\n ✅ | Yuborildi $x

  ❎ | Yuborilmadi $y",
  'reply_markup'=>$panel,
    ]);unlink("nimadir/$cid.txt");unlink("chunk.txt");
unlink("key.txt");
  exit();
  }
 //  @php_bot_kodlari && @Kingsofphp && @phpuzkod
  #----------- [ @veb_code ] ------------#
  ?>