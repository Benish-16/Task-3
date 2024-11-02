const dropItem=document.querySelectorAll('.dropdown-item');
dropItem.forEach(item=>{
    item.addEventListener('click',function(event){
        const dv=this.getAttribute('data-value');
        document.getElementById('in1').value = dv;
    });
});
const dropItem1=document.querySelectorAll('.dropdown-items');
dropItem1.forEach(item=>{
    item.addEventListener('click',function(event){
        const dv=this.getAttribute('data-value');
        document.getElementById('in4').value = dv;
    });
});


const submitt=document.getElementById("submit");
submitt.addEventListener('click',function(){
    const input = parseFloat(document.getElementById('in2').value);
    let output='';
    if(!input){
document.getElementById('alert1').style.visibility='visible';
document.getElementById('alert1').style.backgroundColor="black";
document.getElementById('alert1').style.color="white";
setTimeout(()=>{
    document.getElementById('alert1').style.visibility='hidden';
    },2000);


    }
    else if (isNaN(input)) {
        document.getElementById('in3').value = 'Invalid input'; 
        return;
    }
else if(  document.getElementById('in1').value ==  document.getElementById('in4').value ){
    output=input;
}
else if  (document.getElementById('in1').value.trim()=== "United States Dollar" && document.getElementById('in4').value .trim()=== "Euro") {
 output = (input * 0.92).toFixed(2); }
 else if  (document.getElementById('in1').value.trim()=== "Euro" && document.getElementById('in4').value .trim()=== "United States Dollar") {
    output = (input * (1/0.92)).toFixed(2); }
    else if  (document.getElementById('in1').value.trim()=== "United States Dollar" && document.getElementById('in4').value .trim()=== "Indian Rupee") {
        output = (input * (84.10)).toFixed(2); }
        else if  (document.getElementById('in1').value.trim()=== "Indian Rupee" && document.getElementById('in4').value .trim()=== "United States Dollar") {
            output = (input * (1/84.10)).toFixed(2); }
            else if  (document.getElementById('in1').value.trim()=== "United States Dollar" && document.getElementById('in4').value .trim()=== "Kuwaiti Dinar") {
                output = (input * (0.31)).toFixed(2); }
                else if  (document.getElementById('in1').value.trim()=== "Kuwaiti Dinar" && document.getElementById('in4').value .trim()=== "United States Dollar") {
                    output = (input * (1/0.31)).toFixed(2); }
                    else if  (document.getElementById('in1').value.trim()=== "Euro" && document.getElementById('in4').value .trim()=== "Indian Rupee") {
                        output = (input * (91.41)).toFixed(2); }
                        else if  (document.getElementById('in1').value.trim()=== "Indian Rupee" && document.getElementById('in4').value .trim()=== "Euro") {
                            output = (input * (1/91.41)).toFixed(2); }
                            else if  (document.getElementById('in1').value.trim()=== "Indian Rupee" && document.getElementById('in4').value .trim()=== "Kuwaiti Dinar") {
                                output = (input * (0.0036)).toFixed(2); }
                                else if  (document.getElementById('in1').value.trim()=== "Kuwaiti Dinar" && document.getElementById('in4').value .trim()=== "Indian Rupee") {
                                    output = (input * (1/0.0036)).toFixed(2); }


 document.getElementById('in3').value=output;

});
const reset=document.getElementById("reset");
reset.addEventListener('click',function(){
    document.getElementById('in1').value='';
    document.getElementById('in2').value='';
    document.getElementById('in3').value='';
    document.getElementById('in4').value='';
});

