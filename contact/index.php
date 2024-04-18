<?php
  $path = '..';
  $title = 'お問い合わせ｜株式会社ケアサポートうらら';
  include_once $path.'/include/meta.php';
  include_once $path.'/include/header.php';
?>

<div class="sub_top">
<div class="sub_top_inner">
<div class="sub_top_title">
<div class="sub_top_title_en c_white">
<p>ENTRY・CONTACT</p>
</div>
<div class="sub_top_title_ja c_white">
<p>お問い合わせ</p>
</div>
</div>
</div>
</div>
        <main class="contact_main">
            <div class="privacy">
                <div class="privacy_1">
                    <div class="border"></div>
                    <div class="contact_1">
                        <h4>個人情報保護方針</h4>
                    </div>
                </div>
                <p>当サイトの運営に際し、お客さまのプライバシーを尊重し個人情報に対して充分な配慮を行うとともに、大切に保管し、適性な管理を行うことに努めております。</p>
                <div class="privacy_text">
                    <p>取得した個人情報は、ご本人の同意なしに目的以外では利用しません。ご本人の同意を得ずに第三者に情報を提供しません。ご本人からの求めに応じ情報を開示します。個人情報の取り扱いに関する苦情に対し、適切・迅速に対処します。</p>
                </div>
            </div>
            <div class="contactform">
                <div class="privacy_1">
                    <div class="border"></div>
                    <div class="contact_1">
                        <h4>エントリー・お問い合わせ</h4>
                    </div>
                </div>
            </div>
            <div class="contactform_1">
                <form action="contact-confirm.php" method="post" class="mailForm" id="main-form">
                    <div class="form_bottom name">
                        <label for="guest_name">氏名※</label>
                        <input type="text" id="guest_name" name="guest_name" required />
                    </div>
                    <div class="form_bottom name">
                        <label for="guest_name">ふりがな※</label>
                        <input type="text" id="guest_name_kana" name="guest_name_kana" required />
                    </div>
                    <div class="form_bottom phone">
                        <label for="phone">電話番号</label>
                        <input type="text" id="phone" name="phone" />
                    </div>
                    <div class="form_bottom email">
                        <label for="email">メールアドレス※</label>
                        <input type="text" id="email" name="email" required />
                    </div>
                    <div class="form_bottom email">
                        <label for="re_email">メールアドレス（確認用）※</label>
                        <input type="text" id="re_email" name="re_email" required />
                    </div>
                    <div class="form_bottom license">
                        <label for="license">保有資格</label>
                        <input type="text" id="license" name="license" />
                    </div>
                    <div class="form_bottom content">
                        <div class="contet-label">
                            <label for="content">お問合わせ内容※</label>
                        </div>
                        <textarea id="content" name="content" required></textarea>
                    </div>
                    <div class="contact_buttons">
                        <button type="submit" id="confirm" class="mfp_element_submit mfp_element_all">確認画面へ</button>
                        <button type="reset" class="mfp_element_reset mfp_element_all">リセットする</button>
                    </div>
                </form>
            </div>
    <?php include_once $path.'/include/footer.php'; ?>