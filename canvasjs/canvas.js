var Canvas = document.querySelector("canvas");

Canvas.width= window.innerWidth;
Canvas.height= window.innerHeight;

var c = Canvas.getContext('2d');




var radius = 50;

function Circle(x,y,dx,dy){

this.x=x;
this.y=y;
this.dx=dx;
this.dy=dy;

this.draw= function(){
c.beginPath()
c.arc(this.x,this.y,radius,0,360,false)
c.strokeStyle="blue";
c.stroke()
}

this.update = function(){


    if(this.x+radius>window.innerWidth || this.x -radius <0){
        this.dx = -this.dx
   }
   
   
   if(y+radius>window.innerHeight || y -radius <0){
       this.dy = -this.dy
   }
   
   
   this.x+= this.dx;
   this.y+= this.dy;
  this.draw();
}

}


var circlearray = []


for (var i =0; i< 200;i++){

var x =Math.random()*window.innerWidth;
var y=Math.random()*window.innerHeight;
var dx = (Math.random()-0.5)*30;
var dy = (Math.random()-0.5)*10;

circlearray.push(new Circle(x,y,dx,dy));

}



function animate(){

    




requestAnimationFrame(animate);
 
c.clearRect(0,0,window.innerWidth,window.innerHeight)


   for (var i =0 ; i<circlearray.length;i++){
       circlearray[i].update();
   }

}


animate()