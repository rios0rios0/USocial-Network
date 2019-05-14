<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$id_post = isset($_POST["id"]) ? $_POST["id"] : "";
	$html_text = isset($_POST["html_text"]) ? $_POST["html_text"] : "";
	//
	if (($id_post !== "") && ($html_text !== "")) {
		$id_user = $session->user->id;
		$html_text = base64_encode(utf8_decode(str_replace('"', "'", $html_text)));
		$sql = "INSERT INTO comment (id_user, id_post, html_text) VALUES ($id_user, $id_post, '$html_text')";
		$query = $conn->query($sql);
		if ($query->rowCount() > 0) {
			$out["comment"] = (object)array(
				"user" => array(
					"url" => RoutesManagement::base_url() . "app/controllers/user/index.php?id=" . $id_user,
					"image" => array(
						"url" => RoutesManagement::base_url() . "resources/images/user.png"
					)
				),
				"html_text" => $html_text
			);
			$out["message"] = "Successful inserted comment on post.";
		} else {
			$out["error"] = true;
			$out["message"] = "Error on insert comment on post.";
		}
	} else {
		$out["error"] = true;
		$out["message"] = "All fields is required.";
	}
	DatabaseConnection::close();
	header("Content-type: application/json");
	echo json_encode($out);
	die();
} else {
	RoutesManagement::redirect("/app/");
}