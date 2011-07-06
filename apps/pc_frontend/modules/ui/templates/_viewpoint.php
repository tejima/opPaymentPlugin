
<?php 
 echo $point

?>ポイント
<br />

<form action="/pc_frontend_dev.php/ui/session" method="get">
<select name="amount">
<option value="1000" selected>1,000円</option>
<option value="2000">2,000円</option>
<option value="3000">3,000円</option>
<option value="5000">5,000円</option>
<option value="10000">10,000円</option>
</select>
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="notify_url" value="http://a2m.sv1.pne.jp/pc_frontend_dev.php/paypal/ipn">

<input TYPE="hidden" NAME="return" value="http://a2m.sv1.pne.jp/" >
<input type="hidden" name="business" value="tejima+seller@gmail.com">
<input type="hidden" name="item_name" value="OpenPNEポイント購入 サイト名(<?php echo Doctrine::getTable('SnsConfig')->get('sns_name', 'none'); ?>) ID番号(<?php echo $member->getId(); ?>)">
<input type="hidden" name="currency_code" value="JPY">
<input type="hidden" name="custom" value="<?php echo rand(10000000,99999999) ?>">
<input type="hidden" name="lc" value="JP">
<input type="hidden" name="charset" value="UTF-8">
<input type="image" src="http://dl.dropbox.com/u/151520/permalink/20091230opPaymentPlugin/20091230.png" border="0" name="submit" alt="PayPal - オンラインで安全・簡単にお支払い">
<img alt="" border="0" src="https://www.sandbox.paypal.com/ja_JP/i/scr/pixel.gif" width="1" height="1">
</form>
