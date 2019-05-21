
  function checkForm(form)
  {

	if(form.doc_number.value == "") {
      alert("Error: Please enter control number!");
      form.doc_number.focus();
      return false;
    }
	if(form.doc_type.value == "") {
      alert("Error: Please select document type!");
      form.doc_type.focus();
      return false;
    }
	if(form.doc_name.value == "") {
      alert("Error: Please enter document name!");
      form.doc_name.focus();
      return false;
    }
	if(form.action.value == "") {
      alert("Error: Please select action type!");
      form.action.focus();
      return false;
    }
	if(form.userfile.value == "") {
      alert("Error: Please attach file to upload!");
      form.userfile.focus();
      return false;
    }
	if( document.getElementById("userfile").files.length == 0 ){
		console.log("Please select attachment!");
		return false;
	}
	if(form.office.value == "") {
      alert("Error: Please select recipient!");
      form.office.focus();
      return false;
    }

	
	 return true;
  }

    function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
    function checkPage(bx){

        var bxs = document.getElementByTagName ( "table" ).getElementsByTagName ( "link" ); 

        for(i = 0; i < bxs.length; i++){
            bxs[i].checked = bx.checked? true:false;
        }
    }
	
	jQuery(document).ready(function(){
        jQuery('#hideshow').on('click', function(event) {        
             jQuery('#content').toggle('show');
        });
    });
