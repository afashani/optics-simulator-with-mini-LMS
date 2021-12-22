focalLength = 150;

object = {};
object.position = -200;
object.width = 25;
object.height = 50;

image = {};
lens = {};

lens.width = 20;

function setup(){
    createCanvas(1350,512)
    strokeWeight(1);
    noLoop();
    redraw();
    
    
}
function draw(){
    background("black");

    //principle axis
    stroke("Blue");
    line(0, 250, 1350, 250);

    //lens axis
    stroke("Blue");
    line(675, 0, 675, 675);


    //object
    fill("white");
    rectMode(CENTER);
    rect(500+object.position, 250-object.height/2, object.width, object.height);
    fill("white");
    text(round(object.position), 500+object.position, 250-object.height-object.height/abs(object.height)*50);
    text(abs(round(object.height)), 500+object.position, 250-object.height-object.height/abs(object.height)*25);
    

    //lens
    noFill();
    
    if (object.position > 0) {
        lens.width = -lens.width;
        //focalLength = -focalLength;
    }
    if (focalLength > 0 ^ object.position > 0) {
        var angle = acos((focalLength*2)/(focalLength*2+lens.width));
        lens.dotY = sin(PI-angle)*(focalLength*2+lens.width)
        arc(675-focalLength*2, 250, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? PI : 0)-angle, (object.position > 0 ? PI : 0)+angle);
        arc(675+focalLength*2, 250, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? 0 : PI)-angle, (object.position > 0 ? 0 : PI)+angle);
    } else {
        lens.width /= 1.5;
        var angle = acos((focalLength*2)/(focalLength*2-lens.width));
        lens.dotX = cos(PI-angle)*(focalLength*2+lens.width)+focalLength*2
        lens.dotY = sin(PI-angle)*(focalLength*2+lens.width)
        line(500-lens.dotX, 250+lens.dotY, 500+lens.dotX, 250+lens.dotY);
        line(500-lens.dotX, 250-lens.dotY, 500+lens.dotX, 250-lens.dotY);
        arc(500-focalLength*2, 250, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? 0 : PI)-angle, (object.position > 0 ? 0 : PI)+angle);
        arc(500+focalLength*2, 250, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? PI : 0)-angle, (object.position > 0 ? PI : 0)+angle);
        lens.width *= 1.5;
    }
    if (object.position > 0) {
        lens.width = -lens.width;
        //focalLength = -focalLength;
    }
}
