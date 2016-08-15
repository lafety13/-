function checkSearch() {
	var data = $('#search').val();
	if (data.length == 0) {
		return false;
	}
	return true;
}

function checkForm() {
	var name = document.forms['edit_form']['name'].val();
	var phone = document.forms['edit_form']['phone_number'].val();

	if (name.length == 0 || phone.length == 0) {
		return false;
	}
	return true;
}