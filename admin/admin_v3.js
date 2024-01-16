  const app = Vue.createApp(
	{   data() 
		{    return { 
					  message: "Willkommen im Adminbereich!"    ,  
					  products: [],
					  timestamp : "time ...",
					  interval :0
					}
		} ,
		methods:  {
				fetchData()
					{  console.log("Start fetch ..." );
						fetch("datenbank.php")
						.then(response => response.json())
							 .then((data) => {
							this.products = data;
							console.log("Finish fetch ...")
							console.log(this.products)
							 })				 
					},
				/*
				updateProduct(index) {
					  // Rufe die Daten für das entsprechende Produkt ab
					  const product = this.products[index];

					  // Führe eine AJAX-Anfrage oder verwende Fetch, um die Daten an deine PHP-Datei zu senden
					  // Beachte, dass dies nur ein Beispiel ist und du es an deine Anforderungen anpassen musst
					  fetch('update.php', {
						method: 'POST',
						headers: {
						  'Content-Type': 'application/x-www-form-urlencoded',
						},
						body: new URLSearchParams({
						  'ProduktID': product.ProduktID, // Stelle sicher, dass du die eindeutige ID deines Produkts hier verwendest
						  'NeuerBestand': product.Lagerbestand,
						}),
					  })
					  .then(response => response.json())
					  .then(data => {
						console.log('Aktualisierung erfolgreich:', data);
					  })
					  .catch(error => {
						console.error('Fehler bei der Aktualisierung:', error);
					  });
					},
				*/
				  
				start_timer()
				{
					this.interval = setInterval(() => {
						this.now()
						}, 1000)
				},	
			 	
				increase(index)
				{
					this.products[index].Lagerbestand++;
				},
				decrease(index)
				{
					if(this.products[index].Lagerbestand > 0)
						this.products[index].Lagerbestand--;
				},
				setzero(index)
				{
					this.products[index].Lagerbestand = 0;
				},
				
				now()
				{  //console.log("Start time ..." );
					var date = new Date();
	
					var	datetxt = date.toLocaleDateString("DE-de");
					var	timetxt = date.toLocaleTimeString("DE-de");
					console.log( datetxt+ " " +  timetxt  ) 
					this.timestamp = datetxt+ " " +  timetxt ; 
				}
		},// methods lists end	
	// live cycle hooks 
	mounted () 
		{ 	console.log("mounted!");
			this.fetchData(); 	
		},
	created()
		{   console.log("created!!!!");
			this.start_timer(); 

		} 
		
})	

app.mount('#app')