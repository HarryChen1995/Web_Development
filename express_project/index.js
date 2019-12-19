var exp = require("express")
var app = exp()

var handlebar = require("express3-handlebars").create({defaultLayout:"main"})
app.engine("handlebars", handlebar.engine)
app.set("view engine", "handlebars")

app.set("PORT", process.env.PORT||3000)

app.use(exp.static(__dirname + '/public'))

app.get("/", (req, res)=>{
    res.render("home")
})
var fortune = ["Conquer your fears or they will conquer you.",
                "Rivers need springs.",
                "Do not fear what you don't know.",
                "You will have a pleasant surprise.",
                "Whenever possible, keep it simple."]
app.get("/about", (req, res)=>{
    var randomfortune = fortune[Math.floor(Math.random()*fortune.length)]
    res.render("about", {fortune:randomfortune})
})


app.use((req, res)=>{
    res.status(404)
    res.render("404")
})

app.use((err, req, res, next)=>{
    console.error(err.stack)
    res.status(505)
    res.render("505")
})


app.listen(app.get('PORT'), ()=>{
    console.log("runnning")
})