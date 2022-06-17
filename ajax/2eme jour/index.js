"use strict";
$(function () {
	$("#conn").click(function () {
		let name = "name=" + $("input[name=firstName]").val();
		let nbre = "number=" + $("input[name=number]").val();
		if (
			$("input[name=number]").val().length == 0 &&
			$("input[name=firstName]").val().length == 0
		) {
			$("p").html("");
		} else {
			// console.log(name, nbre);
			$.ajax({
				type: "GET",
				url: "index.php",
				data: name + "&" + nbre,

				success: function (b) {
					$("p").html(b);
				},
			});
		}
	});
});
//$First_name = $_GET["name"];le nom de get est confondue al constante declaree dans ajax,
//$number = $_GET["number"];
