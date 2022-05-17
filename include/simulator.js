focalLength = 150;

object = {};
object.position = -200;
object.width = 25;
object.height = 50;

image = {};
lens = {};

lens.width = 20;

function distance(x1, y1, x2, y2) {
    return sqrt((x1 - x2)**2 + (y1 - y2)**2)
}

function mark(x, colour="white", d=10) {
    stroke(colour);
    line(675-d+x, 256-d, 675+d+x, 256+d);
    line(675+d+x, 256-d, 675-d+x, 256+d);
    
}

function ray(x1, y1, x2, y2, v=true, clr) {
    m = (y2-y1)/(x2-x1);
    stroke("yellow");
       
    line(x1, y1, x2+1350, y2+1350*m);
    if (v) {
        stroke("lime");
        drawingContext.setLineDash([5, 15]);
        line(x1, y1, x1-1350, y1-1350*m);
    }
}

function setup(){
    createCanvas(1350,500)
    strokeWeight(1);
    noLoop();
    redraw();
    
    
}
function draw(){
    background("black");

    //principle axis
    stroke("blue");
    line(0, 256, 1350, 256);

    //lens axis
    stroke("blue");
    line(675, 0, 675, 675);
    mark(-focalLength);
    mark(-focalLength*2);
    mark(focalLength*2);
    mark(focalLength, "white");
    
    fill("white");
    stroke("green");
    textAlign(CENTER);
    // Focal length labelling
    text('F = '+ round(focalLength), 675+focalLength, 280);
    text('2F', 675+focalLength*2, 280);
    text('-F', 675-focalLength, 280);
    text('-2F', 675-focalLength*2, 280);

    //image placement
    image.position = 1/(1/focalLength+1/object.position);
    image.mag = -image.position/object.position;
    image.width = image.mag*object.width;
    image.height = image.mag*object.height;

    


    // Light Rays
    // Line 1 - Through Focal Length distance
    ray(675, 256-object.height, 675+focalLength, 256, "red");
    //stroke("yellow");
    drawingContext.setLineDash([]);
    
    line(675+object.position, 256-object.height, 675, 256-object.height);

    // Line 2 - Through Optical axis
    ray(675, 256, 675+image.position, 256+image.height, "red");
    //stroke("yellow");
    drawingContext.setLineDash([]);
    line(675+object.position, 256-object.height, 675, 256);
    
    // Line 3 - Through F'
    ray(675, 256+image.height, 675+image.position, 256+image.height, "blue");
    //stroke("yellow");
    drawingContext.setLineDash([]);
    line(675+object.position, 256-object.height, 675, 256+image.height);

    //object
    fill("#51C4D3");
    stroke("#352315");
    rectMode(CENTER);
    rect(675+object.position, 256-object.height/2, object.width, object.height);
    fill("white");
    stroke("blue");
    text('D = '+ round(object.position), 675+object.position, 256-object.height-object.height/abs(object.height)*50);
    text('H = '+ abs(round(object.height)), 675+object.position, 256-object.height-object.height/abs(object.height)*25);

    // Image
    fill("#AA14F0");
    stroke("#AA14F0");
    rect(675+image.position, 256+image.height/2, image.width, image.height);
    fill("green");
    stroke("green");
    text('D = '+ round(image.position), 675+image.position, 256+image.height+image.height/abs(image.height)*50);
    text('H = '+ abs(round(image.height*100)/100), 675+image.position, 256+image.height+image.height/abs(image.height)*25);
    

    //lens
    noFill();
    
    if (object.position > 0) {
        lens.width = -lens.width;
        //focalLength = -focalLength;
    }
    if (focalLength > 0 ^ object.position > 0) {
        var angle = acos((focalLength*2)/(focalLength*2+lens.width));
        lens.dotY = sin(PI-angle)*(focalLength*2+lens.width);
        stroke("blue");
        arc(675-focalLength*2, 256, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? PI : 0)-angle, (object.position > 0 ? PI : 0)+angle);
        arc(675+focalLength*2, 256, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? 0 : PI)-angle, (object.position > 0 ? 0 : PI)+angle);
    } else {
        lens.width /= 1.5;
        var angle = acos((focalLength*2)/(focalLength*2-lens.width));
        lens.dotX = cos(PI-angle)*(focalLength*2+lens.width)+focalLength*2
        lens.dotY = sin(PI-angle)*(focalLength*2+lens.width)
        stroke("blue");
        line(675-lens.dotX, 256+lens.dotY, 675+lens.dotX, 256+lens.dotY);
        line(675-lens.dotX, 256-lens.dotY, 675+lens.dotX, 256-lens.dotY);
        stroke("blue");
        arc(675-focalLength*2, 256, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? 0 : PI)-angle, (object.position > 0 ? 0 : PI)+angle);
        arc(675+focalLength*2, 256, focalLength*4+lens.width*2, focalLength*4+lens.width*2, (object.position > 0 ? PI : 0)-angle, (object.position > 0 ? PI : 0)+angle);
        lens.width *= 1.5;
    }
    if (object.position > 0) {
        lens.width = -lens.width;
        //focalLength = -focalLength;
    }

    // SALT Table


var tempp = Math.ceil(image.height);
var tempp2 = Math.ceil(object.height);

//console.log(tempp,tempp2);

    if (tempp == tempp2 || tempp == Infinity) {
        $(".size").text("Size: Equal");
        
    } else if(abs(tempp) > tempp2){
        $(".size").text("Size: Larger");
    } else{
        $(".size").text("Size: Smaller");
    }

    if (image.height > 0) { 
        $(".attitude").text("Attitude: Inverted");
    } else { 
        $(".attitude").text("Attitude: Upright");
    }

    if (abs(image.position) > focalLength*2){
        $(".location").text("Location: Beyond 2F");
    }
    else if(image.position == Infinity){
        $(".location").text("Location: At Infinity");
    }
    else if (abs(image.position) == abs(focalLength*2)) {
        $(".location").text("Location: At 2F");
    } else if (abs(image.position) > focalLength) { 
        $(".location").text("Location: Between F and 2F");
    } else { 
        $(".location").text("Location: Between optical centre and F");
    }

    if (image.position > 0) {
        if(object.position > 0){
            $(".type").text("Type: Virtual");
        }
        else{
            $(".type").text("Type: Real");
        }
    } else { 
        $(".type").text("Type: Virtual");
    }

}
function mouseDragged() {
    if (distance(675+object.position, 256-object.height, mouseX, mouseY) < 80) {
        object.position = mouseX-675;
        object.height = 256-mouseY;
        if (abs(256-mouseY) > abs(lens.dotY)) {
            object.height *= abs(lens.dotY)/abs(object.height);
        }
    }

    if (distance(675+focalLength, 256, mouseX, mouseY) < 40) {
        focalLength = mouseX-675;
    } 

    redraw();
}
