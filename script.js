{
  function multiply(){
    a=Number(document.operators.first.value);
    b=Number(document.operators.second.value);
    c=a*b;
    document.operators.total.value=c;
   
  }

  function addition(){
    a=Number(document.operators.first.value);
    b=Number(document.operators.second.value);
    c=a+b;
    document.operators.total.value=c;
  }


  function subtraction(){
    a=Number(document.operators.first.value);
    b=Number(document.operators.second.value);
    c=a-b;
    document.operators.total.value=c;
  }
  function division() {
    let a = Number(document.operators.first.value);
    let b = Number(document.operators.second.value);
    if (isNaN(a) || isNaN(b) || b === 0) {
      document.operators.total.value = '0';
    } else {
      document.operators.total.value = a / b;
    }
  }
  
  function modulus(){
    let a = Number(document.operators.first.value);
    let b = Number(document.operators.second.value);
    if (isNaN(a) || isNaN(b) || b === 0) {
      document.operators.total.value = '0';
    } else {
      document.operators.total.value = a % b;
    }
  }
}



console.log("Welcome");
//document.write(55);


//window.alert(5 + 6);

//alert(5 + 56);
document.write("<br>hello world<br>");
console.log("hello world");

{
var firstName = "Bishu";
 console.log(firstName);
 }


{
var firstName = "Bishu";
firstName = "bishu";
console.log(firstName);
}

{
let firstName = "Bishuuu";
console.log(firstName);
}

{
var a = 10;
var b = 9;
var c = a + b;
console.log (c);
}

//Assignment operators
document.write('<h3>Assignment operators</h3>');
{
    let a = 5;
    let b = 2;
    let c = a + b;
    let d = a - b;
    let e = a / b;
    let f = a * b;
    let g = a % b;
    let h = a ** b;
    let i = a++;
    let j = ++a  ;
    let k = a--;
    let l = --a;
    document.write(f);
    document.write('<br/>');
}

{
let a = 5;
let b = 2;
c = a+8; 
d = a-8; 
e = a*8; 
f = a/8; 
g = a%8; 
h = a**8; 
document.write('no.');
document.write(h);
document.write('<br/>');
}

//Comparison operators
document.write('<h3>Comparison operators</h3>');
{
 let a = 6;
 let b = 8;
 document.write("a == b ",a == b);
 document.write('<br/>');
 document.write("a != b ",a != b);
 document.write('<br/>');
 document.write("a === b ",a === b);
 document.write('<br/>');
 document.write("a !== b ",a !== b);
 document.write('<br/>');
 document.write("a > b ",a > b);
 document.write('<br/>');
 document.write("a < b ",a < b);
 document.write('<br/>');
 document.write("a >= b ",a >= b);
 document.write('<br/>');
 document.write("a <= b ",a <= b);
 document.write('<br/>');
}

// Logical Operators
document.write('<h3>Logical Operators</h3>');
{
let a = 6;
let b = 5;
let cond1 = a > b;
let cond2 = a === 6;
document.write("cond1 && cond2 =",cond1 && cond2);//if both conds was true then AND&& was run.
document.write('<br/>');

let c = 6;
let d = 5;
let conds1 = c < d;
let conds2 = c === 6;
document.write("conds1 || conds2 =",conds1 || conds2);// one conds was true then OR|| was run.
document.write('<br/>');

let f = 6;
let g = 5;
document.write("!(f < g ) =", !(f < g)); 
}

//Conditional Statement
document.write('<h3>Conditional Statement</h3>');
//IF
let mode = "dark";
let color;
if (mode === "dark"){
    color = "black";
}
if(mode === "light"){
   color = "white";
}
 document.write(color);
 document.write('<br/>');

//IF ELSE

 let modee = "silver";
 let colorr ;
 if(modee ==="dark"){
    colorr = "black";
}else{
    colorr = "white";
}document.write(colorr);
document.write('<br/>');

let num = 5;

if(num %2 ===0){
    document.write(num," is Even");
}else{
    document.write(num," is Odd");
}
document.write('<br/>');


//IF ELSE IF
let age = 63;
if(age < 18){
    document.write("Junior");
}else if(age >60){
    document.write("Senior");
}else{
    document.write("Middle");
}
document.write('<br/>');
{
document.write(new Date(8.64e15).toString()); 
}
document.write('<br/>');

let nummb = 3;
if(a === 0 && b === 0){
    document.write(o);
}

document.write('<h3>Loop</h3>');
//for loop

for(i = 1;i<5;i++){
document.write("<h4>Hello<br></4>");
}

//while loop
{
let i = 1;
while(i <= 5){
    document.write("Welcome<br>");
    i++;
}
}
//Do While
{
let i = 1;
do{
    document.write("Hyee<br>");
    i++;
}while(i<=10);
}
document.write("<br>");
// for of Loop

let str = "Javascript";
let size = 1;
for (let val of str){
document.write("val =",val);
document.write("<br>");
size++;

}
const students = {
    fullName : "Bishu",
    age : 23,
    };
    students["age"] = students ["age"] + 1;
    console.log (students);
    
    
    //array
    document.write('<h3>Array</h3>');
    const student = {
        fullName : "Bishu",
        age : 23,
        };
        //student["age"] = student ["age"] + 1;
        document.write (student["age"]);
        document.write("<br>");


let heroes = ["Ironman","hulk","thor","Antman"]
             document.write(heroes);        
             document.write("<br>");

 // LOOP OVER AN ARRAY
 //for loop array
 {
 let heroes = ["Ironman ","hulk ","thor ","Antman"]
 for(let idx = 0; idx < heroes.length;idx++){
    document.write(heroes[idx]);
 }
 }
 document.write("<br>");

 //for of loop array
{
 let heroes = ["Ironman ","hulk ","thor ","Antman"]
  for(let hero of heroes){
    document.write(hero);
  }
}
document.write("<br>");

//10% off in all items

{
    let items = [250, 645, 300, 900, 50];
    let i = 0;
    for (let val of items) {
      document.write(`value of index ${i} = ${val}<br>`);
      let offer = val / 10;
      items[i] = items[i] - offer;
      document.write(`value after offer = ${items[i]} <br>`);
      i++;
    }
}
document.write("<br>");


{
let items = [250, 645, 300, 900, 50];

for(let i = 0;i < items.length;i++){
let offer = items[i] / 10;
items[i] -= offer; 
}   
document.write(items);

}
document.write("<br>");
//array methods
//push():
{
let fooditems = ["Mango","Apple","Banana","Tomato"];
fooditems.push("litch");
document.write(fooditems);
}
document.write("<br>");

//pop():
{
    let fooditems = ["Mango","Apple","Banana","Tomato"];
   let deletitems = fooditems.pop();
    document.write("Delete Items = ",deletitems);
    document.write("<br>");
    document.write(fooditems);
}
document.write("<br>");

//tostring():
{
  let fooditems = ["Mango","Apple","Banana","Tomato"];
  document.write("String - ",fooditems.toString());
}
document.write("<br>");
{
let marvelHeroes = ["Thor","Spiderman","Ironman",];
let dcHeroes = ["Superman","Batman"];
let heroes = marvelHeroes.concat(dcHeroes);
document.write(heroes);
}
document.write("<br>");

//unshift():
{
let marvelHeroes = ["Thor","Spiderman","Ironman",];
 marvelHeroes.unshift("Antman");
 document.write(marvelHeroes);
}
document.write("<br>");

//shift():
{
let marvelHeroes = ["Thor","Spiderman","Ironman",];
 marvelHeroes.shift();
 document.write("Deleted - ",marvelHeroes);
}
document.write("<br>");

//slice():return a piece of array
{
let marvelHeroes = ["Thor","Spiderman","Ironman","Antman","DR.Stange"];
document.write(marvelHeroes.slice(1,3));
}
document.write("<br>");

//splice
{
let num = [1,2,3,4,5,6,7];
num.splice(2,2,1021,102);
document.write(num);
}
document.write("<br>");

//splice (add Element)
{
let num = [1,2,3,4,5,6,7];
num.splice(2,0,102);
document.write("Add Element - ",num);
}
document.write("<br>");

//splice (delete Element)
{
let num = [1,2,3,4,5,6,7];
num.splice(3,1);
document.write("Delete - ",num);
}
document.write("<br>");

//splice (replace Element)
{
let num = [1,2,3,4,5,6,7];
num.splice(3,1,101);
document.write("Replace - ",num);
}
document.write("<br>");


//Function in JS

function myfunction(msg){
  //parameter -> input
  document.write(msg);
}
myfunction("i Love JS"); // call (argument)

document.write("<br>");
//Function 2 number,sum

  function sum(x,y){
    document.write(x + y);
  }
  sum(6,8)

  document.write("<br>");
{
  function sum(x,y){
    document.write(x * y);
  }
  sum(6,8)
}

// 2nd method
document.write("<br>");
{
  function sum(x,y){
    s = x * y;
    return s;
  }
  document.write(sum(5,9));
}
document.write("<br>");

//Arrow Function
//morden JS
{
  let arrowSum = (a,b)=> {
    document.write(a + b);
  };
  arrowSum(6,9);
}
document.write("<br>");
{
  const arrowSum = (a,b)=> {
    return a + b;
  };
  document.write(arrowSum(6,2));
} 
document.write("<br>");

//COUNT VOWELS

  function countvowels(str){
    let count = 0;
    for (const char of str){
      if (char === "a" ||
      char === "e" ||
      char === "i" ||
      char === "o" ||
      char === "u" 
      ){
        count++;
      }
    }
    return count;
  }
  document.write(countvowels("bishwajeet"));
  document.write("<br>");


  // foreach loop in array

  let arr = ["Pune","Delhi","Mumbai"];
  arr.forEach((val) => {
   document.write(val);
  });

  document.write("<br>"); 
//map array

let nums = [1,2,3,4,5,6,7,8,9];
let newarr = nums.map ((val) => {
  return val * 2;
});
document.write(newarr);

document.write("<br>"); 

//Filter array

let abc = [1,2,3,4,5,6,7,8,9,10];
let evenarr = abc.filter((val) =>{
  return val % 2 === 0;
});
document.write(evenarr);

document.write("<br>"); 

//Reduce Array

let abcd = [1,2,3,4,5,6,7,8,9,10];
const output = abcd.reduce((res,curr) => {
  return res + curr;
});
    document.write("single value =",output);

    document.write("<br>"); 

