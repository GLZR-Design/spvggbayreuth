/* -------------------------------------------------------------------------- */
/*                               Sportspress API                              */
/* -------------------------------------------------------------------------- */

getResults() {
	$.getJSON("http://localhost:8888/spvggbayreuth/wp-json/sportspress/v2/events", function (data) {
			alert(data[0].main_results[0] + ":" + data[0].main_results[1]);
		}
	);
}