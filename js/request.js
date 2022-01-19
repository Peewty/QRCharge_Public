function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace(
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;
	}
	return vars;
}

var name = $_GET('id');
console.log(name);
var url = '../data.php'+'?id='+$_GET('id');
console.log(url);

var get = function(url, success, error) {
  //console.log(url); // for debug
var ajax = new XMLHttpRequest();

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        console.log(ajax.responseText);
        success (ajax.responseText);
      } else {
        error(ajax);
      }
    }
  }
    //sending ajax request
    ajax.open("GET", url, true);
    ajax.send();
}
