
var tabClicked = new Array();

function submitDetailsForm() {
	$('#u-input').submit();
}
function tgChk(node) {
	console.log(node);
	$(node).find('input[type="checkbox"]').attr("checked", !$(node).find('input[type="checkbox"]').attr("checked"));
}

function oSize(obj) {
		var size = 0, key;
		for (key in obj) {
				if (obj.hasOwnProperty(key)) size++;
		}
		return size;
};
