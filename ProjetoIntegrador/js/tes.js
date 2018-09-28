
	 	// CONSTRUCTOR DEL GRÁFICO
// -----------------------
function MansoGrafico(coords){
	var self              = this;
	// Div del grafico.
	this.grafico          = document.getElementById('grafico');
	// Sección donde van los puntos del gráfico.
	this.indice           = document.getElementById('grafico').getElementsByClassName('indice')[0];
	// Sección donde van los números del gráfico.
	this.numeros          = document.getElementById('grafico').getElementsByClassName('numeros')[0];

	this.contPuntos       = document.getElementById('grafico').getElementsByClassName('indice')[0].getElementsByClassName('cont_puntos')[0];
	this.contTri          = document.getElementById('grafico').getElementsByClassName('indice')[0].getElementsByClassName('cont_tri')[0];
	// Puntos del Gráfico.
	this.punto            = '';
	this.divRangoNormal   = document.getElementById('grafico').getElementsByClassName('rango_normal')[0];

	this.separacionPuntos = 120;
	this.contFechas       = document.getElementsByClassName('cont_fechas')[0].getElementsByClassName('fechas')[0];


	// PARA SABER SI UN ELEMENTO TIENE UNA CLASE ESPECÍFICA.
	this.tc = function(elemento, clase){
		var elementos = document.getElementsByClassName(elemento);
		var tiene     = false;

		for (var i = 0; i < elementos.length; i++) {
			var clases = elementos[i].classList;

			for (var e = 0; e < clases.length; e++) {
				if (clases[e] == clase) {
					tiene = true;
					break;
				}
			}
			return tiene;
		}
	}

	// DEVUELVE LA CANTIDAD DE PUNTOS QUE TIENE EL GRÁFICO
	// ---------------------------------------------------
	this.cantPuntos = function(){
		var cantidad = 0;
		for(var i in coords.evaluaciones){
			cantidad++;
		}
		return cantidad;
	}

	// CREA LOS PUNTOS DEL GRÁFICO
	// ---------------------------
	this.crearPuntos = function(){
		var distancia = this.separacionPuntos;
		var cont      = 0;
		// Recorro el JSON con las coordenadas y le asigno la posición a cada punto.
		for(var i in coords.evaluaciones){
			// Punto.
			// this.punto += '<div class="punto" style="left:'+ distancia +'px; bottom: '+ coords.evaluaciones[i].y +'px"></div>';
			this.punto = document.createElement('div');
			this.punto.classList.add('punto');
			this.punto.style.left = distancia+'px';
			this.punto.style.bottom = ((coords.evaluaciones[i].y) * 4) - (coords.rango_general.min * 4)+9+'px';

				// Creo un div para los valores.
				this.valorPunto = document.createElement('div');
				this.valorPunto.classList.add('valorPunto', 'animOculto');

					this.valorPunto.innerHTML = "<p>"+coords.evaluaciones[i].y+"</p><p>pontos</p>";

				// Pongo el div "valorPunto" dentro del div "punto".
				this.punto.appendChild(this.valorPunto);

				// Creo un div para la linea punteada.
				this.lineaPunteada = document.createElement('div');
				this.lineaPunteada.classList.add('linea_punteada');
				this.lineaPunteada.style.height = ((coords.evaluaciones[i].y) * 4) - (coords.rango_general.min * 4)+9+'px';
				this.punto.appendChild(this.lineaPunteada);

			//Pongo el punto.
			this.contPuntos.appendChild(this.punto);

			// Aumento la distancia.
			distancia+=this.separacionPuntos;
			cont++;
		}

		// Le doy un ancho al div "indice".
		this.indice.style.width = (cont * this.separacionPuntos)+this.separacionPuntos+'px';
	}

	// CREAR LOS TRIÁNGULOS
	// --------------------
	this.triangulos = function(){
		var distancia = this.separacionPuntos;
		var lasCoor   = '';
		var alto      = this.indice.clientHeight;
		var cont      = 0;
		var tri;
		var ranMin    = coords.rango_general.min;

		for(tri in coords.evaluaciones){
			lasCoor += distancia + ',' + (alto - ((coords.evaluaciones[tri].y * 4) - ((ranMin*4)-20))) + ' ';
			distancia = distancia + this.separacionPuntos;
			cont++;
		}

		// Creo los SVG y los pongo dentro del div "cont_tri";
		this.contTri.innerHTML += ''+
		'<div class="tri" style="left:10px;">'+
			'<svg width="'+cont * this.separacionPuntos +'" height="'+alto+'">'+
				'<polygon points=" '+lasCoor+' '+cont * this.separacionPuntos +','+alto+' '+this.separacionPuntos+','+alto+'" fill="rgba(147,147,132,.28)" />'+
				'<polyline fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" points="'+lasCoor+'"/>' +
			'</svg>'+
		'</div>';
	}

	// TOOLTIP VALOR DEL PUNTO
	// -----------------------
	this.toolTipValorPunto = function(){
		var puntos = document.getElementsByClassName('punto');
		for (var i = 0; i < puntos.length; i++) {
			puntos[i].addEventListener('click', function(event){
				// booleano
				var tiene  = false;
				// Guardo las clases de "valorPunto"
				var clases = this.getElementsByClassName('valorPunto')[0].classList;

				// Recorro las clases y comparo si tiene la que busco.
				for (var i = 0; i < clases.length; i++) {
					if (clases[i] == 'animOculto') {
						// Si la tiene entonces el booleano es true.
						tiene = true;
					}
				}

				// Sabiendo si tiene o no la clase le saco la clase de animación o se la pongo.
				if( tiene ){
					this.getElementsByClassName('valorPunto')[0].classList.remove('animOculto');
				}else{
					this.getElementsByClassName('valorPunto')[0].classList.add('animOculto');
				}
			});
		}
	}
	this.traerFechas = function(){
		var lasFechas = '';
		var cont = 0;
		for(var i in coords.evaluaciones){
			cont++;
			this.contFechas.innerHTML += '<span style="width:'+this.separacionPuntos+'px; left:'+this.separacionPuntos*cont+'px">'+coords.evaluaciones[i].fecha+'</span>';
		}
		this.contFechas.style.width = (this.separacionPuntos * cont)+this.separacionPuntos+'px';
	}


	// CREA EL RANGO GENERAL
	// ---------------------
	this.crearRangoGeneral = function(){
		// Tomo el mínimo y máximo desde el JSON.
		var min  = coords.rango_general.min;
		var max  = coords.rango_general.max;
		// Hago un for para poner los span necesarios.
		for(var i=max ; i>=min ; i-=10){
			this.numeros.innerHTML += '<span>'+i+'</span>';
		}
	}

	// CREA EL RANGO NORMAL
	// --------------------
	this.crearRangoNormal = function(){
		var minGeneral = coords.rango_general.min;
		var minNormal  = coords.rango_normal.min;
		var maxNormal  = coords.rango_normal.max;
		// Formula para posicionar la barra de rango normal: mínimo Normal - mínimo general. Esto x 4 ya que son 40px de alto de los números laterales, más 20 que es la mitad de los 40px.
		this.divRangoNormal.style.bottom = ((minNormal*4)-(minGeneral*4))+20 + 'px';
		// this.divRangoNormal.style.width  = this.cantPuntos()*100+100+'px';
		this.divRangoNormal.style.height = (maxNormal-minNormal)*4+'px';
		// console.log(minGeneral+' '+minNormal);
	}

	// DEVUELVE LA POSISCIÓN DEL DIV "INDICE"
	// --------------------------------------
	this.indicePosicion = function(){
		return this.indice.offsetLeft;
	}

	// ARRASTRANDO EL GRÁFICO
	// ----------------------
	this.arrastrando = function(event){

		var empieza;
		var mientras;
		var termina;
		var toqueClick;
		var posicionEInicio;
		var posicionEActual;
		var posicionIndice;
		var movido;
		var anchoGrafico = this.grafico.offsetWidth;
		var anchoIndice  = this.indice.offsetWidth;
		var anchoTotal   = (anchoIndice - anchoGrafico) * -1;
		var fechas 		 = document.getElementsByClassName('fechas')[0];
		var moviendo     = false;
		var movil        = 'ontouchstart' in window;

		self.indice.style.left = anchoTotal+'px';
		fechas.style.left = anchoTotal+'px';

		if (movil) {
			empieza  = 'touchstart';
			mientras = 'touchmove';
			termina  = 'touchend';
		}else{
			empieza  = 'mousedown';
			mientras = 'mousemove';
			termina  = 'mouseup';
		}

		// Comienzo a arrastrar
		this.indice.addEventListener(empieza, function(event){
			moviendo = true;

		// this.indice.addEventListener('touchstart', function(event){
			// Posición del evento cuando inicia.

			if (movil) {
				posicionEInicio = event.touches[0].clientX;
			}else{
				posicionEInicio = event.clientX;
			}

			// Saco la posición del div "indice" cuando inicia el evento.
			posicionIndice = self.indicePosicion();
			// console.log(anchoIndice);
		});

		// Mientras arrastro
		document.addEventListener(mientras, function(event){
		// this.indice.addEventListener('touchmove', function(event){
			if (moviendo) {
				// Posición actual del evento.

				//
				if (movil) {
					posicionEActual = event.touches[0].clientX;
				}else{
					posicionEActual = event.clientX;
				}

				// Cuánto se ha movido el evento.
				movido = posicionEActual - posicionEInicio;
				// console.log((posicionIndice + movido)+ 'px');

				if ((posicionIndice+movido) < 0 && posicionIndice+movido > anchoTotal) {
					// Pongo la posición al div "indice".
					self.indice.style.left = (posicionIndice + movido)+ 'px';
					fechas.style.left = (posicionIndice + movido)+ 'px';

				}
			}
		});
		// Finalizo de arrastrar.
		document.addEventListener(termina, function(event){
		// this.indice.addEventListener('touchend', function(event){
			// self.indice.style.left = (posicionIndice + movido)+ 'px';
			moviendo = false;
		});
	}
}



// JSON CON LAS COORDENADAS DEL GRÁFICO
// ------------------------------------
