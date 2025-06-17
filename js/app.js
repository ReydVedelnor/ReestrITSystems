let filterButton = document.querySelector("#myFilterButton");//Кнопка фильтрации внизу окна
let filterModal = document.querySelector("#filter");//Модальное окно фильтрации отображаемых атрибутов

let clos = document.querySelector("#close");//Кнопка закрытия модального окна фильтрации отображаемых атрибутов
let sav = document.querySelector("#save");//Кнопка сохранения модального окна фильтрации отображаемых атрибутов

let filterSystem = document.querySelector("#filterSystemsButton");//Кнопка поиска системы 1
let filterModalSystems = document.querySelector("#filterModalSystems");//Модальное окно поиска системы

let clossystem = document.querySelector("#closSystem");//Кнопка закрытия модального окна поиска системы
let savesystem = document.querySelector("#savSestem");//Кнопка сохранения модального окна поиска системы

let filterServices = document.querySelector("#filterServicesButton");//Кнопка поиска услуг 2

let filterNaimSystems = document.querySelector("#filterNaimSystemsButton");//Кнопка поиска наименование системы 3

let filterShortNaim = document.querySelector("#filterShortNaimSystemsButton");//Кнопка поиска краткого наименование системы 4

let filterFullNaim = document.querySelector("#filterFullNaimSystemsButton");//Кнопка поиска полного наименование системы 5

//Открытие модального окно фильтрации отображаемых атрибутов
filterButton.addEventListener('click', () => {
    filterModal.style.display = "flex";
	getSystems();
});

//Открытие модального окно поиска системы
filterSystem.addEventListener('click', () => {
    filterModalSystems.style.display = "flex";
});

//Открытие модального окно поиска услуг
filterServices.addEventListener('click', () => {
    filterModalSystems.style.display = "flex";
});

//Открытие модального окно поиска наименование системы
filterNaimSystems.addEventListener('click', () => {
    filterModalSystems.style.display = "flex";
});

//Открытие модального окно поиска краткого наименование системы
filterShortNaim.addEventListener('click', () => {
    filterModalSystems.style.display = "flex";
});

//Открытие модального окно поиска полного наименование системы
filterFullNaim.addEventListener('click', () => {
    filterModalSystems.style.display = "flex";
});

//Закрытие модального окна фильтрации отображаемых атрибутов
clos.addEventListener('click', () => {
    filterModal.style.display = "none";
});

//Сохранение фильтрации отображаемых атрибутов
sav.addEventListener('click', () => {
    filterModal.style.display = "none";
});

//Закрытие модального окна поиска системы
clossystem.addEventListener('click', () => {
    filterModalSystems.style.display = "none";
});

//Сохранение поиска системы
savesystem.addEventListener('click', () => {
    filterModalSystems.style.display = "none";
});

/*create.forEach(i=>{
	let id = i.id;
	/*i.addEventListener('click', (e, id)=>{handle(e, id)});
	i.addEventListener('click', (e)=>{handleLabelClick(e, id)});
});*/

function handleLabelClick(id) {
	let create = document.getElementById(id);
	const img = create.getElementsByTagName("img");
	let list = document.querySelectorAll(".checkboxes2layer");
	list.forEach(r=>{
		if(id==r.id){
			if (r.style.display == "" || r.style.display == "none"){
				img[0].src = 'images/vector-up.png';
				r.style.display = "block";
			}else{
				if(r.style.display == "block"){
					img[0].src = 'images/vector-down.png';
					r.style.display = "none";
				}
			};
		};
	});
}

fetch('data.json')
	.then(function (response) {
		return response.json();
	})
	.then(function (data) {
		appendData(data);
	})
	.catch(function (err) {
		console.log('error: ' + err);
	});

		
function appendData(data){
	const tbody=document.querySelector("#tbody");
	try{
		let tr="";
		if(data.empty=== "empty"){
			tr="<tr>Record Not Found</tr>"
		}else{
			for(var i in data){
				console.log(data[i]);
				tr+=`
				<tr class="horizintalFrames" onclick="document.location='editingTheSystem.html'">
				<td class="backgroundLinesText" >${data[i].filterSystem}</td>
				<td class="backgroundLinesText" >${data[i].filterServices}</td>
				<td class="backgroundLinesText" >${data[i].filterNaimSystems}</td>
				<td class="backgroundLinesText" >${data[i].filterShortNaim}</td>
				<td class="backgroundLinesText" >${data[i].filterFullNaim}</td>
				`
			}
		}
		tbody.innerHTML=tr;
	}catch(error){
		console.log("error " + error.message);
	}
}

const getSystems=async()=>{
    try{
        const dropDownList=document.querySelector(".modal-main");
        let tr="";
        const res = await fetch("php/selectMainScreenData.php", {
            method: "GET",
            headers:{
                "Content-Type": "application/json"
            }
        });
        const output = await res.json();
		console.log(output);
        if(output.empty=== "empty"){
            tr="<p>Record Not Found</p>"
        }else{
            output.map((i,index)=>{
				console.log(i.atributes[0].atribute_name);
                tr+=`
				<div class="checkbox" id=${i.groupeID}>
					<input type="checkbox" id="checkbox_1">
					<label for="checkbox_1">${i.groupeName}</label>
					<div style="padding: 15px 0px 10px 15px" onclick="handleLabelClick(${i.groupeID})"><img class="img" style="height:15px;" type="images" src='images/vector-down.png'/></div>
				</div>
				<div id=${i.groupeID} class="checkboxes2layer">
					<div class="checkbox2layer">
						<input type="checkbox" id="checkbox_16">
						<label for="checkbox_16">${i.atributes[0].atribute_name}</label>
					</div>
					<div class="checkbox2layer">
						<input type="checkbox" id="checkbox_17">
						<label for="checkbox_17">Рубли</label>
					</div>
					<div class="checkbox2layer">
						<input type="checkbox" id="checkbox_18">
						<label for="checkbox_18">Наличные</label>
					</div>
					<div class="checkbox2layer">
						<input type="checkbox" id="checkbox_19">
						<label for="checkbox_19">Центы</label>
					</div>
					<div class="checkbox2layer">
						<input type="checkbox" id="checkbox_20">
						<label for="checkbox_20">Безнал</label>
					</div>
				</div>
				`
            })
        }
        dropDownList.innerHTML=tr;
    }catch(error){
        console.error("error:" + error.message);
    }
}

//getSystems();