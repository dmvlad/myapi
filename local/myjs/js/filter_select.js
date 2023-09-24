var FilterSelect = BX.namespace('FilterSelect');




$( document ).ready(function() {

var elements = $('.ui-entity-editor-field-select');
	console.dir(elements); 
	
// Фильтруем элементы по значению атрибута data-cid равному "TYPE_ID"
var filteredElements = elements.filter(function() {
return $(this).attr('data-cid') === 'TYPE_ID';
});

// Добавляем событие onclick только на отфильтрованные элементы
filteredElements.click(function() {
// Ваш обработчик события onclick
let getParam = $('#popup-window-content-menu-popup-TYPE_ID .menu-popup-items');
		//console.dir(getParam[0].children); 


// Используем цикл for для перебора элементов
if(getParam[0] != null){


for (var i = 0; i < getParam[0].children.length; i++) {
	// Получаем текущий элемент
	var currentElement = getParam[0].children[i];
	
	if(i > 1){
		currentElement.remove();
	}


	// Делаем что-то с текущим элементом
	//$(currentElement).text("Элемент " + (i + 1));
  }


//console.log('Клик на элементе с атрибутом data-cid равным TYPE_ID');
}

});


});







FilterSelect.typeOfWork = function () {
    





	



	BX.ready(function () {

		//console.log('here we are'); 
		let LISTEN_VAR = 'TYPE_ID';


		

		// Находим input с атрибутом name равным TYPE_ID
		/*
		var input = $('.ui-entity-editor-field-select');





		// Добавляем событие onclick на найденный input
		input.click(function() {
			let getParam = $('#popup-window-content-menu-popup-TYPE_ID .menu-popup-items');
			console.dir(getParam); 
			// ui-entity-editor-field-select
			//console.log('Клик на input с атрибутом name равным TYPE_ID');
		});
		*/



		//let fsrDeatils = BX.Crm.EntityEditor.defaultInstance.getControlById('TYPE_ID');
		//console.log(fsrDeatils);

		BX.addCustomEvent("BX.UI.EntityEditor:onControlChanged", function(params){
			

			if(params._id === 'TYPE_ID') {
				console.log('annnnd here we are'); 

				let select = BX.Crm.EntityEditor.defaultInstance._formElement.querySelectorAll('select[name="UF_CRM_1631977251855"]')[0];
				clearSelect(select);



				//let fsrDeatils = BX.Crm.EntityEditor.defaultInstance.getControlById('UF_WORK_DETAIL_FSR');
				//console.log('222: ' + fsrDeatils); 				
			}
		});
		

		
		BX.addCustomEvent("BX.UI.EntityEditorField:onLayout", function(params){

			console.log(params); 

			if(params._id === "UF_CRM_1631977251855"){

				console.log('UF_CRM_1631977251855 works'); 
				let select = BX.Crm.EntityEditor.defaultInstance._formElement.querySelectorAll('select[name="UF_CRM_1631977251855"]')[0];
				clearSelect(select);
			}

	        if(params._id === LISTEN_VAR) {
				console.log('or here we are'); 
	        	let typesOfWork = BX.Crm.EntityEditor.defaultInstance.getControlById(LISTEN_VAR);
	        	let costCenter = typesOfWork._editor._model._initData[COST_CENTER_VAR];
	               //console.log(typesOfWork); 

	        	if(typesOfWork.isActive()) {

        			let select = BX.Crm.EntityEditor.defaultInstance._formElement.querySelectorAll('select[name="' + LISTEN_VAR + '"]')[0];

	        		if(costCenter.IS_EMPTY){
	        			//console.log('Cost center is EMPTY!');
	        			//alert('Cost Center is EMPTY!');
	        			clearSelect(select);
	        		}else{

	        			let currentValue = '';

	        			if (typeof typesOfWork._editor._model._initData[LISTEN_VAR].VALUE !== 'undefined') {
	        				currentValue = typesOfWork._editor._model._initData[LISTEN_VAR].VALUE;
	        			}
	        			query(costCenter.VALUE, select, currentValue);
	        		}

	        	}
	        	
	        }

	    });

	    function query(data, select, currentSelectValue){

	         BX.ajax({
	           url: '/local/myjs/ajax/getUserTypesOfWork.php?data=' + data,
	            data: data,
	            method: 'POST',
	            dataType: 'json',
	            timeout: 10,
	            onsuccess: function( res ) {
	                clearSelect(select);
	                res.forEach((e)=>{
	                    if(currentSelectValue == e.ID)
	                    {
	                        select.add(new Option(e.NAME, e.ID, false, true), undefined)
	                    }else{
	                        select.add(new Option(e.NAME, e.ID), undefined);
	                    }
	                });
	            },
	            onfailure: e => {
	               console.log(e); 
	           }                      
	        });
	     }

	     function clearSelect(select){
	            select.innerHTML = null;
	            select.add(new Option('не выбрано',''), undefined);
	            select[0].selected = true;
	    }
	     
	})

}