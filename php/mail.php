<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJtYWlsLnBocCJdLCJzb3VyY2VzQ29udGVudCI6WyI8P3BocFxyXG5cclxuJG1ldGhvZCA9ICRfU0VSVkVSWydSRVFVRVNUX01FVEhPRCddO1xyXG5cclxuLy9TY3JpcHQgRm9yZWFjaFxyXG4kYyA9IHRydWU7XHJcbmlmICggJG1ldGhvZCA9PT0gJ1BPU1QnICkge1xyXG5cclxuXHQkcHJvamVjdF9uYW1lID0gdHJpbSgkX1BPU1RbXCJwcm9qZWN0X25hbWVcIl0pO1xyXG5cdCRhZG1pbl9lbWFpbCAgPSB0cmltKCRfUE9TVFtcImFkbWluX2VtYWlsXCJdKTtcclxuXHQkZm9ybV9zdWJqZWN0ID0gdHJpbSgkX1BPU1RbXCJmb3JtX3N1YmplY3RcIl0pO1xyXG5cclxuXHRmb3JlYWNoICggJF9QT1NUIGFzICRrZXkgPT4gJHZhbHVlICkge1xyXG5cdFx0aWYgKCAkdmFsdWUgIT0gXCJcIiAmJiAka2V5ICE9IFwicHJvamVjdF9uYW1lXCIgJiYgJGtleSAhPSBcImFkbWluX2VtYWlsXCIgJiYgJGtleSAhPSBcImZvcm1fc3ViamVjdFwiICkge1xyXG5cdFx0XHQkbWVzc2FnZSAuPSBcIlxyXG5cdFx0XHRcIiAuICggKCRjID0gISRjKSA/ICc8dHI+JzonPHRyIHN0eWxlPVwiYmFja2dyb3VuZC1jb2xvcjogI2Y4ZjhmODtcIj4nICkgLiBcIlxyXG5cdFx0XHRcdDx0ZCBzdHlsZT0ncGFkZGluZzogMTBweDsgYm9yZGVyOiAjZTllOWU5IDFweCBzb2xpZDsnPjxiPiRrZXk8L2I+PC90ZD5cclxuXHRcdFx0XHQ8dGQgc3R5bGU9J3BhZGRpbmc6IDEwcHg7IGJvcmRlcjogI2U5ZTllOSAxcHggc29saWQ7Jz4kdmFsdWU8L3RkPlxyXG5cdFx0XHQ8L3RyPlxyXG5cdFx0XHRcIjtcclxuXHRcdH1cclxuXHR9XHJcbn0gZWxzZSBpZiAoICRtZXRob2QgPT09ICdHRVQnICkge1xyXG5cclxuXHQkcHJvamVjdF9uYW1lID0gdHJpbSgkX0dFVFtcInByb2plY3RfbmFtZVwiXSk7XHJcblx0JGFkbWluX2VtYWlsICA9IHRyaW0oJF9HRVRbXCJhZG1pbl9lbWFpbFwiXSk7XHJcblx0JGZvcm1fc3ViamVjdCA9IHRyaW0oJF9HRVRbXCJmb3JtX3N1YmplY3RcIl0pO1xyXG5cclxuXHRmb3JlYWNoICggJF9HRVQgYXMgJGtleSA9PiAkdmFsdWUgKSB7XHJcblx0XHRpZiAoICR2YWx1ZSAhPSBcIlwiICYmICRrZXkgIT0gXCJwcm9qZWN0X25hbWVcIiAmJiAka2V5ICE9IFwiYWRtaW5fZW1haWxcIiAmJiAka2V5ICE9IFwiZm9ybV9zdWJqZWN0XCIgKSB7XHJcblx0XHRcdCRtZXNzYWdlIC49IFwiXHJcblx0XHRcdFwiIC4gKCAoJGMgPSAhJGMpID8gJzx0cj4nOic8dHIgc3R5bGU9XCJiYWNrZ3JvdW5kLWNvbG9yOiAjZjhmOGY4O1wiPicgKSAuIFwiXHJcblx0XHRcdFx0PHRkIHN0eWxlPSdwYWRkaW5nOiAxMHB4OyBib3JkZXI6ICNlOWU5ZTkgMXB4IHNvbGlkOyc+PGI+JGtleTwvYj48L3RkPlxyXG5cdFx0XHRcdDx0ZCBzdHlsZT0ncGFkZGluZzogMTBweDsgYm9yZGVyOiAjZTllOWU5IDFweCBzb2xpZDsnPiR2YWx1ZTwvdGQ+XHJcblx0XHRcdDwvdHI+XHJcblx0XHRcdFwiO1xyXG5cdFx0fVxyXG5cdH1cclxufVxyXG5cclxuJG1lc3NhZ2UgPSBcIjx0YWJsZSBzdHlsZT0nd2lkdGg6IDEwMCU7Jz4kbWVzc2FnZTwvdGFibGU+XCI7XHJcblxyXG5mdW5jdGlvbiBhZG9wdCgkdGV4dCkge1xyXG5cdHJldHVybiAnPT9VVEYtOD9CPycuQmFzZTY0X2VuY29kZSgkdGV4dCkuJz89JztcclxufVxyXG5cclxuJGhlYWRlcnMgPSBcIk1JTUUtVmVyc2lvbjogMS4wXCIgLiBQSFBfRU9MIC5cclxuXCJDb250ZW50LVR5cGU6IHRleHQvaHRtbDsgY2hhcnNldD11dGYtOFwiIC4gUEhQX0VPTCAuXHJcbidGcm9tOiAnLmFkb3B0KCRwcm9qZWN0X25hbWUpLicgPCcuJGFkbWluX2VtYWlsLic+JyAuIFBIUF9FT0wgLlxyXG4nUmVwbHktVG86ICcuJGFkbWluX2VtYWlsLicnIC4gUEhQX0VPTDtcclxuXHJcbm1haWwoJGFkbWluX2VtYWlsLCBhZG9wdCgkZm9ybV9zdWJqZWN0KSwgJG1lc3NhZ2UsICRoZWFkZXJzICk7Il0sImZpbGUiOiJtYWlsLnBocCJ9