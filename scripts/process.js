// Обработка данных о количестве пациентов за период:
	function checkPosition() {
		var roller = document.getElementById("roller");
		var patQuant = document.getElementById("patQuant");
		patQuant.value = roller.value;
	}

// Обработка нажатий на кнопки выбора периода:
	function savePeriod(value) {
		if (value == 1) {
			document.getElementById("per1").style.backgroundPosition = "0 -55px";
			document.getElementById("per2").style.backgroundPosition = "0 -110px";
			document.getElementById("per3").style.backgroundPosition = "0 -220px";
			
			var butState = document.getElementById("butSt");
			butState.value = 1;
			checkFunc();
		}
		if (value == 2) {
			document.getElementById("per1").style.backgroundPosition = "0 0";
			document.getElementById("per2").style.backgroundPosition = "0 -165px";
			document.getElementById("per3").style.backgroundPosition = "0 -220px";
			
			var butState = document.getElementById("butSt");
			butState.value = 2;
			checkFunc();
		}
		if (value == 3) {
			document.getElementById("per1").style.backgroundPosition = "0 0";
			document.getElementById("per2").style.backgroundPosition = "0 -110px";
			document.getElementById("per3").style.backgroundPosition = "0 -275px";
			
			var butState = document.getElementById("butSt");
			butState.value = 3;
			checkFunc();
		}
	}

// Не перейдём на след. слайд, пока не вылечим, не выберем период:
	
	function checkFunc() {
		if (document.getElementById("healed").value == "healed" &&
			document.getElementById("butSt").value >= 1 && document.getElementById("butSt").value <= 3) {
				document.getElementById("send").style.display = "block";
		}
	}
	
	
// Функции, обеспечивающие перетаскивание таблеточки:
	var pill = document.getElementById("pill");
		
	pill.onmousedown = function(event) {
		var self = this;
		event = fixEvent(event);
			
		var coords = getCoords(this);
		var shiftX = event.pageX - coords.left;
		var shiftY = event.pageY - coords.top;
			
		this.style.position = "absolute";
		document.body.appendChild(this);
		moveAt(event);
		
		this.style.zIndex = "3";
			
		function moveAt(event) {
			self.style.left = event.pageX - shiftX + "px";
			self.style.top = event.pageY - shiftY + "px";
		}
			
		document.onmousemove = function(event) {
			event = fixEvent(event);
			moveAt(event);
		};
			
		this.onmouseup = function() {
			document.onmousemove = self.onmouseup = null;
			var final = document.getElementById("pill");
			var box = final.getBoundingClientRect();
			var posX = box.left;
			var posY = box.top;
			if (posX >= 380 && posX <= 600) {
				if (posY >= 40 && posY <= 240) {
					final.style.display = "none";
					var oldman = document.getElementById("oldman");
					oldman.style.backgroundPosition = "0 -380px";
					
					var healedTransf = document.getElementById("healed");
					healedTransf.value = "healed";
					checkFunc();
				}
			}
		};
	}
	
	pill.ondragstart = function() {
		return false;
	};
		
// Описание функции fixEvent()
	function fixEvent(event, _this) {
		event = event || window.event;
			
		if (!event.currentTarget) event.currentTarget = _this;
		if (!event.target) event.target = event.srcElement;
			
		if (!event.relatedTarget) {
			if (event.type == "mouseover") event.relatedTarget = event.fromElement;
			if (event.type == "mouseout") event.relatedTarget = event.toElement;
		}
			
		if (event.pageX == null && event.clientX != null) {
			var html = document.documentElement;
			var body = document.body;
				
			event.pageX = event.clientX + (html.scrollLeft || body && body.scrollLeft || 0);
			event.pageX -= html.clientLeft || 0;
				
			event.pageY = event.clientY + (html.scrollTop || body && body.scrollTop || 0);
			event.pageY -= html.clientTop || 0;
		}
			
		if (!event.which && event.button) {
			event.which = event.button & 1 ? 1 : (event.button & 2 ? 3 : (event.button & 4 ? 2 : 0));
		}
		return event;
	}
		
// Описание функции getCoords()
	function getCoords(elem) {
		var box = elem.getBoundingClientRect();
			
		var body = document.body;
		var docEl = document.documentElement;
			
		var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
		var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;
			
		var clientTop = docEl.clientTop || body.clientTop || 0;
		var clientLeft = docEl.clientLeft || body.clientLeft || 0;
			
		var top = box.top + scrollTop - clientTop;
		var left = box.left + scrollLeft - clientLeft;
			
		return {top: Math.round(top), left: Math.round(left)};
	}
	