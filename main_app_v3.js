  const app = Vue.createApp(
	{ 	data() 
		{    return { 
				message: "Hallo Welt!"    ,  
				products: [],
				timestamp: "",
				search: "",
				localOrderQuantity: {},
				filteredProducts: [],
				cart: {
					products: [],
					gesamtanzahl: 0,
					gesamtpreis: 0
				}	
			}
		} ,
		methods:  {
				fetchData(){
					console.log("Start fetch ...")
					fetch("datenbank.php")
					.then(response => response.json())
					.then((data) => {
					  this.products = data;
					  this.filteredProducts = this.products;
					  console.log("Finish fetch ...")
					})
				},
				
				filter() {
					console.log(this.search);
					this.filteredProducts = this.products.filter(book => {
						return book.Produkttitel.toLowerCase().includes(this.search.toLowerCase())
					});
					console.log(this.filteredProducts);
				},
				start_timer()
				{
					this.interval = setInterval(() => {
						this.now()
						}, 1000)
				},
				// TODO: check if order() works	
				order(index){
					console.log("ORDER " + index + " " + this.products[index].Produkttitel + " starts");
					if (this.cart["products"].includes(this.products[index])) {
						this.products[index].localOrderQuantity ++;
					}
					else {
						this.products[index].localOrderQuantity = 1;
						this.cart["products"].push(this.products[index]);
					}
					this.cart.gesamtanzahl++;
					this.cart.gesamtpreis += parseFloat(this.products[index].PreisBrutto);
					console.log("ORDER " + index + " " + this.products[index].Produkttitel + " finishes");
				},
				increase(index)
				{
					console.log("INCREASE CART " + index + ' ' + this.cart.products[index].Produkttitel + " starts");
		
					if (this.cart.products[index].localOrderQuantity < this.products[index].Lagerbestand){
						this.cart.products[index].localOrderQuantity++;
						this.cart.gesamtanzahl++;
						this.cart.gesamtpreis += parseFloat(this.cart.products[index].PreisBrutto);
						//this.cart.products[index].Lagerbestand--;
					}

					console.log("INCREASE CART " + index + ' ' + this.cart.products[index].Produkttitel + " finishes");
				},
				decrease(index)
				{
					console.log("DECREASE CART " + index + ' ' + this.cart.products[index].Produkttitel + " starts");
					
					if (this.cart.products[index].localOrderQuantity > 0) {
						this.cart.products[index].localOrderQuantity--;
						this.cart.gesamtanzahl--;
						this.cart.gesamtpreis-= parseFloat(this.cart.products[index].PreisBrutto);
						//this.cart.products[index].Lagerbestand--;
					}
					

					if (this.cart.products[index].localOrderQuantity == 0) {
						this.cart["products"].splice(index, 1);
					}
					
					
					console.log("DECREASE CART " + index + ' ' + this.cart.products[index].Produkttitel + " finishes");
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