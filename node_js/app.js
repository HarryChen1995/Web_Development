var express = require('express');
var app = express();
var mysql = require('mysql');
var path = require("path")
var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended: true });
 
// Running Server Details.
var server = app.listen(8082, function () {
  var host = server.address().address
  var port = server.address().port
  console.log("Example app listening at %s:%s Port", host, port)
});
 
 

app.set('views', __dirname + '/public');
app.engine('html', require('ejs').renderFile);




app.get("/", function(req, res){

    
    res.render("index.html");

});



app.post("/add",urlencodedParser,function(req, res){

  var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "286246666",
    database: "hanlinchen"
  });

  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "INSERT INTO users (username, email) VALUES ('"+req.body.username+"','"+req.body.email+"')";
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("1 record inserted");
    });

  });

  res.render("information.html", {

      name:req.body.username,
      email:req.body.email


  });


 


});