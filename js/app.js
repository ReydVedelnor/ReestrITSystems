let create = document.querySelectorAll(".checkbox");
let list = document.querySelectorAll(".checkboxes2layer");

create.forEach(i=>{
	let id = i.id;
	/*i.addEventListener('click', (e, id)=>{handle(e, id)});*/
	i.addEventListener('click', (e)=>{handleLabelClick(e, id)});
});

/*function handle(e, id) {
	console.log(e);
	list.forEach(r=>{
		if(id==r.id){
			console.log(r.id);
		};
	});
	/*const label = event.target.closest("label");
	if (label) {
		return;
	};
	if (list.style.display == "" || list.style.display == "none"){
		list.style.display = "block";
	}else{
		if(list.style.display == "block"){
			list.style.display = "none";
		}
	};
	const img = event.target.closest("img");
	e.stopPropagation();
}*/

function handleLabelClick(e, id) {
	const label = e.target.closest("label");
	if (label && this.label) {
		return;
	};
	list.forEach(r=>{
		if(id==r.id){
			if (r.style.display == "" || r.style.display == "none"){
				r.style.display = "block";
			}else{
				if(r.style.display == "block"){
					r.style.display = "none";
				}
			};
		};
	});
	const img = e.target.closest("img");
	img.src = 'images/vector-up.png';
}
