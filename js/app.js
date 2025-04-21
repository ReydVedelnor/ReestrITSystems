let create = document.querySelector(".checkbox");
let list = document.querySelector(".checkboxes2layer");

create.addEventListener('click', handleLabelClick);

function handleLabelClick(event) {
	const label = event.target.closest("label");
	if (label && this.contains(label)) {
		return;
	}
	if (list.style.display == "" || list.style.display == "none"){
		list.style.display = "block";
	}else{
		if(list.style.display == "block"){
			list.style.display = "none";
		}
	}
	const img = event.target.closest("img");
	console.log(create.value);
}