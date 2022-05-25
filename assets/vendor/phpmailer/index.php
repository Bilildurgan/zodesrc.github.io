<?php 

include 'class.phpmailer.php';


$smtpuser="iletisim@zodesoftware.com";
$smtphost="tardu.veridyen.com";
$smtpport="587";
$smtppass="02.02.2002Bil";

if (isset($_POST["mail_gonder"])) { 


 $adsoyad = htmlspecialchars($_POST["adsoyad"]);
  $eposta = htmlspecialchars($_POST["eposta"]);
  $konu = htmlspecialchars($_POST["konu"]);
  $mesaj = htmlspecialchars($_POST["mesaj"]);






	
	$epostal=$smtpuser;
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = $smtphost;
	$mail->Port = $smtpport;
	$mail->SMTPSecure = 'tls';
	$mail->Username = $smtpuser;
	$mail->Password = $smtppass;
	$mail->SetFrom($mail->Username, $adsoyad);
	$mail->AddAddress($smtpuser, $adsoyad);

	$mail->CharSet = 'UTF-8';
	$mail->Subject = "$konu";
	$content = '
	<b>Websitenizden gelen iletişim maili</b><br>
	<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

		<tr>
			<td class="tg-031e">Ad Soyad: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$adsoyad.'</td>
		</tr>
		<tr>
			<td class="tg-031e">Eposta: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$eposta.'</td>
		</tr>
		<tr>
			<td class="tg-031e">Mesaj: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$mesaj.'</td>
		</tr>
	</table>';





	$mail->MsgHTML($content);
	if($mail->Send()) {
			echo "mail gonderildi";
			echo '<a href="'.get_option('home').'/index.html"><img src="'.bloginfo('template_url').'/yanmenuler/hakkimizda.png" alt="'.bloginfo('name').' Hakkımızda" /></a>';
	
	} 
	else {
            echo "mail gonderilmedi";
	}

}



exit;

?>

