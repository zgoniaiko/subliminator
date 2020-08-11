# subliminator

Write an app that can handle orders from multiple sources.

Main components:
- Orders page where we will see the order details + source
- 1 Button "Create order from Amazon" which will create an order as it comes from Amazon
- 1 Button "Create order from Etsy"

The JSON for Amazon order:
{
	"name": "Boris",
	"email": "boris@example.com",
	"shipping_address": "Faroe Islands",
	"amount": 7846
}

The JSON for Etsy order:
{
	"first_name": "Ali",
	"last_name": "Test",
	"email": "ali@example.com",
	"address": "French Southern Territories",
	"amount": 9
},

As you can see the structure of the JSONs is different.
We are interested in how this functionality can be abstracted so it will be easier to add a new source.
