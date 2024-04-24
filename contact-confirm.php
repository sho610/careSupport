


<?php
  if ( !isset($_POST['email']) ) {
    header('Location: /contact/');
    exit();
  } else {
    foreach ($_POST as $key => $rowPost) {
      if ( $key === 'content' ) {
        $data[$key] = nl2br($rowPost);
        continue;
      }
      $data[$key] = htmlspecialchars($rowPost);
    }
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="description" content="当社は、利用者様を第一に、自分らしく安心して過ごせる環境を提供します。世界一の温かいサービスを通じて、一人ひとりの幸せを願い、社会に貢献します。">
  <meta name="keywords" content="訪問介護,訪問看護,訪問入浴,配食サービス">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>株式会社ケアサポート うらら｜お問い合わせ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="株式会社ケアサポート うらら">
  <meta property="og:site_name" content="株式会社ケアサポート うらら">
  <meta property="og:title" content="株式会社ケアサポート うらら">
  <meta property="og:description" content="当社は、利用者様を第一に、自分らしく安心して過ごせる環境を提供します。世界一の温かいサービスを通じて、一人ひとりの幸せを願い、社会に貢献します。">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://csurara.com/">
  <link rel="canonical" href="https://csurara.com/">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/contact.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    (function (d) {
      var config = {
          kitId: 'jlu5zco',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function () {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function () {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>

  <script>
    (function (d) {
      var config = {
          kitId: 'jlu5zco',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function () {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function () {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
</head>

<body>
<header>
    <div class="logo">
      <!-- <img src="" alt=""> -->
      <a href="index.html" class="header_logo">ケアサポートうらら</a>
    </div>
    <button class="hamburger-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="header-item-wrap">
      <ul class="header-item">
        <li class="header-text header-top"><a href="index.html">top</a></li>
        <li class="header-text header-business acc-title">
          <a href="business.html">事業内容</a>
          <div class="acc-content">
            <ul>
              <li class="acc-item">
                <a href="./business.html#nurse">
                  訪問看護
                </a>
              </li>
              <li class="acc-item">
                <a href="./business.html#bathing">
                  訪問入浴
                </a>
              </li>
              <li class="acc-item">
                <a href="./business.html#nursing-care">
                  訪問介護
                </a>
              </li>
              <li class="acc-item">
                <a href="./business.html#meal-distribution">
                  配色サービス
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="header-text header-recrute"><a href="recruit.html">採用情報</a></li>
        <li class="header-text header-overview"><a href="company.html">会社概要</a></li>
        <li class="header-text header-contact"><a href="contact.html">お問い合わせ</a></li>
        <li class="header-text header-tel">075-432-8508</li>
      </ul>
    </div>
  </header>



<main>
  <div class="marginT contactform_1">
                <div class="form_bottom name">
                    <label for="guest_name">氏名※</label>
                    <div class="confirmation_text">
                        <h4><?= $data['guest_name'] ?></h4>
                    </div>
                </div>
                <div class="form_bottom name">
                    <label for="guest_name">ふりがな※</label>
                    <div class="confirmation_text">
                        <h4><?= $data['guest_name_kana'] ?></h4>
                    </div>
                </div>
                <div class="form_bottom phone">
                    <label for="phone">電話番号</label>
                    <div class="confirmation_text">
                        <h4 <?= $data['phone'] =='' ? 'class="empty"' : '' ?>><?= $data['phone'] ?></h4>
                    </div>
                </div>
                <div class="form_bottom email">
                    <label for="email">メールアドレス※</label>
                    <div class="confirmation_text">
                        <h4><?= $data['email'] ?></h4>
                    </div>
                </div>
                <div class="form_bottom license">
                    <label for="license">保有資格</label>
                    <div class="confirmation_text">
                        <h4 <?= $data['license'] =='' ? 'class="empty"' : '' ?>><?= $data['license'] ?></h4>
                    </div>
                </div>
                <div class="form_bottom content">
                    <div class="contet-label">
                        <label for="content">お問合わせ内容※</label>
                    </div>
                    <div class="confirmation_text">
                        <h4><?= $data['content'] ?></h4>
                    </div>
                </div>
                <div class="specialmarginT contact_buttons">
                    <button type="submit" id="send" class="mfp_element_submit mfp_element_all">送信する</button>
                    <button type="reset" id="back" href="/contact/" class="mfp_element_reset mfp_element_all" onclick="window.history.back();">リセットする</button>
                </div>
                <div class="message" id="message">
                    <p id="message_inner"></p>
                </div>
            </div>

</main>
<footer>
    <div class="footer-wrap">
      <div class="footer-content">
        <div class="footer-logo">
          <!-- <img src="" alt=""> -->
          ケアサポートうらら
        </div>
        <div class="footer-add">
          〒604-8457<br>
          京都市中京区西ノ京馬代町6-9ウエストハウス101
        </div>
        <div class="footer-link-wrap">
          <div class="footer-link-item footer-top"><a href="index.html">TOP</a></div>
          <div class="footer-link-item footer-business"><a href="business.html">事業内容</a></div>
          <div class="footer-link-item footer-recruit"><a href="recruit.html">採用情報</a></div>
          <div class="footer-link-item footer-overview"><a href="company.html">会社概要</a></div>
        </div>
        <div class="footer-btn-wrap">
          <div class="footer-contact-btn btn"><a href="contact.html">お問い合わせ<span>▶︎</span></a></div>
          <div class="footer-tel">
            <div class="footer-tel-btn btn">075-432-8508</div>
            <div class="footer-tel-time">※受付時間9:00〜18:00</div>
          </div>
        </div>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.431529982385!2d135.72333001117354!3d35.0209328726942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001079701802b57%3A0x953aba0840fe631e!2z44CSNjA0LTg0NTcg5Lqs6YO95bqc5Lqs6YO95biC5Lit5Lqs5Yy66KW_44OO5Lqs6aas5Luj55S677yW4oiS77yZIOOCpuOCqOOCueODiOODj-OCpuOCuSAxMDE!5e0!3m2!1sja!2sjp!4v1713146589368!5m2!1sja!2sjp"
        width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="copyright textcenter">Copyright © 2024 株式会社ケアサポート うらら Inc. All Rights Reserved.</div>
  </footer>


  <!-- footer読み込み -->
  <!--#include virtual="./common/footer.html"-->
  <script src="./index.js"></script>
</body>

</html>

    
