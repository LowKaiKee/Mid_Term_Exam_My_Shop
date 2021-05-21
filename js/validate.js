function validateAddNew() {
	var uploadfile = document.forms.addNew.idimage.value;
	var prname = document.forms.addNew.idname.value;
	var prtype = document.forms.addNew.idtype.value;
	var prprice = document.forms.addNew.idprice.value;
	var prqty = document.forms.addNew.idqty.value;


	if ((prname === '') || (prtype === '') || (prprice === '') || (prqty === '')) {
		alert('Please fill in all required fields');
		return false;
	}

	if (uploadfile === '') {
		alert("Please select your product image");
		return false;
	}

	if (prtype === 'noselection') {
		alert("Please select the product type");
		return false;
	}
}
