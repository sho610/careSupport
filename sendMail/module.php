<?php

  function sendMailToGuest($requests)
  {
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $send_from = "QandA@csurara.com";
    $from = mb_encode_mimeheader("株式会社ケアサポートうらら");
    $head = '';
    $head .= "Content-Type: text/plain \r\n";
    $head .= "From: ".$from."<".$send_from.">\r\n";
    $head .= "Sender: ".$from." \r\n";
    $head .= "X-Sender: ".$from." \r\n";
    $head .= "X-Priority: 3 \r\n";
    $to = $requests['email'];
    $title = "【株式会社ケアサポートうらら】お問い合わせありがとうございます";
    $message = <<< EOM

※このメールはシステムからの自動返信です

{$requests['guest_name']}様

株式会社ケアサポートうららへお問い合わせ頂きまして誠にありがとうございます。

以下の内容でお問い合わせを受け付けいたしました。

折り返し担当者よりご連絡させて頂きますので、

今しばらくお待ちくださいませ。

━━━━━━□■□　お問い合わせ内容　□■□━━━━━━

氏名：{$requests['guest_name']}

ふりがな：{$requests['guest_name_kana']}

電話番号：{$requests['phone']}

メールアドレス：{$requests['email']}

保有資格：{$requests['license']}

お問い合わせ内容：
{$requests['content']}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOM;
    return mb_send_mail(
      $to,
      $title,
      $message,
      $head,
      "-f".$send_from
    );
  }

  function sendMailToManager($requests)
  {
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    // 追加
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    // 追加終了

    $send_from = "QandA@csurara.com";
    $from = mb_encode_mimeheader("株式会社ケアサポートうらら");
    $head = '';
    $head .= "Content-Type: text/plain \r\n";
    $head .= "From: ".$from."<".$send_from.">\r\n";
    $head .= "Sender: ".$from." \r\n";
    $head .= "X-Sender: ".$from." \r\n";
    $head .= "X-Priority: 3 \r\n";
    $to = 'csurara1020@gmail.com';
    $title = "ホームページのお問い合わせ";

    // 追加
    $message = "<p>This is a <strong>test</strong> message.</p>";
    $message = htmlspecialchars($message, ENT_QUOTES, "UTF-8");
    // 追加終了

    $message =  <<< EOM

「ホームページのお問い合わせ」よりメールが届きました。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━

【氏名】
{$requests['guest_name']}

【ふりがな】
{$requests['guest_name_kana']}

【電話番号】
{$requests['phone']}

【メールアドレス】
{$requests['email']}

【保有資格】
{$requests['license']}

【お問い合わせ内容】
{$requests['content']}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOM;
    return mb_send_mail(
      $to,
      $title,
      $message,
      $head,
      "-f".$send_from
    );
  }
